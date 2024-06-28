<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogProposal;
use App\Models\ProposalOrmawa;
use App\Models\RevisiProposal;
use App\Models\RiwayatRevisiOrmawa;
use App\Models\User;
use App\Http\Controllers\MailController;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class AjukanDokumenController extends Controller
{
    public function index()
    {
        return view('ormawa.ajukansurat');
    }

        public function ajukanProposal(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'file_proposal' => 'required|file|mimes:doc,docx',
            ]);
            $file_proposal = $request->file('file_proposal');

            $nomor_proposal = ProposalOrmawa::where('created_by', Auth::id())->count() + 1;
            $nama_ormawa = Auth::user()->name;
            $tanggal_pengajuan = now()->format('Ymd');

            $nama_file = "Proposal{$nomor_proposal}-{$nama_ormawa}-{$tanggal_pengajuan}.".$file_proposal->getClientOriginalExtension();

            $file_path = $file_proposal->storeAs('proposal_files', $nama_file, 'public');

            $proposal = new ProposalOrmawa();
            $proposal->judul = $request->input('judul');
            $proposal->deskripsi = $request->input('deskripsi');
            $proposal->tipe = "pengajuan";
            $proposal->status = "admin";
            $proposal->status_persetujuan = "pending";
            $proposal->file_proposal = $file_path;
            $proposal->created_by = Auth::id(); 
            $proposal->save();

            $log = new LogProposal();
            $log->action = 'Pengajuan Proposal';
            $log->keterangan = 'Proposal diajukan oleh ' . Auth::user()->name;
            $log->proposal_id = $proposal->id;
            $log->user_id = Auth::id();
            $log->save();

            $mailController = new MailController();
            $to = 'bksap24cmswebsite@gmail.com';
            $subject = 'Pengajuan Proposal oleh ' . Auth::user()->name;
            $body = 'Judul Proposal: ' . $proposal->judul . '<br>' .
                    'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
                    'Tanggal Diajukan: ' . $proposal->created_at . '<br>' .
                    'Nama Ormawa: ' . Auth::user()->name . '<br>'.
                    'Silakan unduh file proposal di sini: <a href="' . asset('storage/' . $file_path) . '">Download Proposal</a>';
            $mailController->sendEmail($to, $subject, $body);

            return redirect()->route('ormawa.cek_progress')->with('success', 'Proposal berhasil diajukan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupload file final.');
        }
    }


    public function cek_progress()
    {
        $proposals = ProposalOrmawa::where('created_by', Auth::id())
        ->orderBy('updated_at', 'desc') 
        ->get();

        $proposalData = [];
        foreach ($proposals as $proposal) {
            $latestLog = LogProposal::where('proposal_id', $proposal->id)
            ->orderBy('created_at', 'desc') 
            ->first();

        $lamaProses = null;
        if ($proposal->approved_at) {
            $approvedAt = Carbon::parse($proposal->approved_at);
            $createdAt = Carbon::parse($proposal->created_at);
            $diff = $approvedAt->diff($createdAt);
            $lamaProses = $diff->format('%d hari, %h jam, %i menit');
        }
        $proposalData[] = [
            'id' => $proposal->id,
            'judul' => $proposal->judul,
            'deskripsi' => $proposal->deskripsi,
            'status' => $proposal->status,
            'status_persetujuan' => $proposal->status_persetujuan,
            'action' => $latestLog ? $latestLog->action : null,
            'file_proposal' =>$proposal->file_proposal,
            'keterangan' => $latestLog ? $latestLog->keterangan : null,
            'created_at' => $proposal->created_at,
            'approved_at' => $proposal->approved_at,
            'lama_proses' => $lamaProses,
            'file_final' => $proposal->file_final,
            'file_final_sekjen' => $proposal->file_final_sekjen,
        ];
        }

        return view('ormawa.transparansisurat', compact('proposalData'));
    }

    public function listRevisi(Request $request, $proposalId)
    {
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $riwayatRevisi = RiwayatRevisiOrmawa::where('proposal_id', $proposalId)->get();
    
        $revisiProposals = RevisiProposal::where('proposal_id', $proposalId)->get();
        return view('ormawa.list_revisi', compact('proposal', 'revisiProposals','riwayatRevisi'));
    }


    public function showCreateRevisi($proposalId, $revisiId)
    {
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $revisiProposal = RevisiProposal::findOrFail($revisiId);

        return view('ormawa.create_revisi', compact('proposal', 'revisiProposal'));
    }
    
    
    public function kirimRevisi(Request $request, $proposalId, $revisiId)
    {
        try {
            $request->validate([
                'judul' => 'required|string',
                'deskripsi' => 'required|string',
                'file_proposal' => 'required|file|mimes:doc,docx',
            ]);
    
            $proposal = ProposalOrmawa::findOrFail($proposalId);
            $revisiProposal = RevisiProposal::findOrFail($revisiId);
            $ormawaUser = User::findOrFail($proposal->created_by);
            $nama_ormawa = $ormawaUser->name;
            $nama_komisi = Auth::user()->name;
            $tanggal_revisi = now()->format('Ymd');
            $nomor_revisi = $revisiProposal->id;
    
            $nama_file_revisi = "Proposal{$proposalId}-{$nama_ormawa}-RevisiOrmawa{$nomor_revisi}_{$nama_komisi}-{$tanggal_revisi}.".$request->file('file_proposal')->getClientOriginalExtension();
    
            $proposal->judul = $request->judul;
            $proposal->tipe = "revisi";
            $proposal->is_checked = false;
            $proposal->deskripsi = $request->deskripsi;
            $proposal->file_proposal = $request->file('file_proposal')->storeAs('proposal_files', $nama_file_revisi, 'public');
            $proposal->save();
    
            // Tandai revisi sebagai selesai oleh ormawa
            $revisiProposal->is_revision_done_by_ormawa = 1;
            $revisiProposal->save();
    
            // Simpan riwayat revisi jika ada
            $riwayatRevisi = RiwayatRevisiOrmawa::where('revisi_id', $revisiId)->first();
            if ($riwayatRevisi) {
                $riwayatRevisi->judul_hasil_revisi = $request->judul;
                $riwayatRevisi->deskripsi_hasil_revisi = $request->deskripsi;
                $riwayatRevisi->file_hasil_revisi = $proposal->file_proposal;
                $riwayatRevisi->save();
            }
    
            // Buat log untuk tindakan kirim revisi
            $log = new LogProposal();
            $log->action = 'Kirim Revisi Proposal';
            $log->keterangan = 'Revisi Proposal #' . $revisiProposal->id . ' dikirim oleh ' . Auth::user()->name;
            $log->proposal_id = $proposal->id;
            $log->user_id = Auth::id();
            $log->save();
    
            // Kirim email ke pemberi revisi
            $pemberiRevisi = User::findOrFail($revisiProposal->revised_by);
            $pemberiRevisiEmail = $pemberiRevisi->email;
    
            $mailController = new MailController();
            $to = $pemberiRevisiEmail;
            $subject = 'Proposal Direvisi oleh ' . Auth::user()->name;
            $body = 'Proposal yang Anda revisi telah diperbarui oleh '. Auth::user()->name. 'Berikut ini adalah detail perubahan proposal:' . '<br>' .
                    'Judul Proposal: ' . $proposal->judul . '<br>' .
                    'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
                    'Silakan unduh file proposal di sini: <a href="' . asset('storage/proposal_files/' . $nama_file_revisi) . '">Download Proposal</a>';
            $mailController->sendEmail($to, $subject, $body);
    
            // Redirect dengan pesan sukses
            return redirect()->route('ormawa.proposal.revisi', ['proposalId' => $proposalId])->with('success', 'Revisi berhasil dikirim!');
            
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
    }
    
    
    public function uploadFileFinal(Request $request, $proposalId)
    {
        try {
            $request->validate([
                'file_final' => 'required|file|mimes:pdf,doc,docx', 
            ]);
        
            $proposal = ProposalOrmawa::findOrFail($proposalId);
        
            if ($request->hasFile('file_final')) {
                $file = $request->file('file_final');
        
                $file_name = "File Final Proposal ({$proposalId})_{$proposal->judul}_Ormawa.".$file->getClientOriginalExtension();
        
                $file_path = $file->storeAs('file_finals', $file_name, 'public');
        
                $proposal->file_final = $file_path;
                $proposal->save();
        
                // Kirim email kepada penerima yang ditentukan
                $mailController = new MailController();
        
                // List email yang ditentukan
                $emails = [
                    'senatmahasiswa.fhundip@gmail.com',
                    'bksap24cmswebsite@gmail.com',
                    'badananggaransenatfh@gmail.com'
                ];
        
                // Mendapatkan email dari user dengan id yang sesuai dengan proposal
                $komisiId = $proposal->komisi_checked_by;
                $komisiUser = User::where('id', $komisiId)->first();
                $komisiEmail = $komisiUser ? $komisiUser->email : null;
        
                // Jika email komisi ditemukan, tambahkan ke dalam list email
                if ($komisiEmail) {
                    $emails[] = $komisiEmail;
                }
        
                // Kirim email ke setiap alamat yang ditentukan
                foreach ($emails as $email) {
                    $to = $email;
                    $subject = 'File Final Proposal oleh ' . Auth::user()->name;
                    $body = 'File Final Proposal telah diupload oleh ' . Auth::user()->name . '. Alur pengajuan proposal telah selesai. Silakan temukan file terlampir.'. '<br>' .
                        'Judul Proposal: ' . $proposal->judul . '<br>' .
                        'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
                        'Tanggal Diajukan: ' . $proposal->created_at . '<br>' .
                        'Nama Ormawa: ' . Auth::user()->name . '<br>'.
                        'Silakan unduh file proposal di sini: <a href="' . asset('storage/' . $file_path) . '">Download Proposal</a>';
                    $mailController->sendEmail($to, $subject, $body);
                }
        
                return redirect()->back()->with('success', 'File final berhasil diupload dan email telah dikirim.');
            }
        
            return redirect()->back()->with('error', 'Gagal mengupload file final.');
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
        
    }    
}
