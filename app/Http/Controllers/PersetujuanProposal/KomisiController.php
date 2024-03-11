<?php

namespace App\Http\Controllers\PersetujuanProposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogProposal;
use App\Models\ProposalOrmawa;
use App\Models\User;
use App\Models\RevisiProposal;
use App\Models\RiwayatRevisiOrmawa;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Storage;

class KomisiController extends Controller
{
    public function belumDiperiksa()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('komisi_checked_by', $userId)
        ->where('status', 'komisi')
        ->where('is_checked', 0)
        ->get();
         $proposalData = [];
         foreach ($proposals as $proposal) {
             $proposalData[] = [
                 'id' => $proposal->id,
                 'judul' => $proposal->judul,
                 'deskripsi' => $proposal->deskripsi,
                 'status' => $proposal->status,
                 'komisi_checked_by' => $proposal->komisi_checked_by,
                 'status_persetujuan' => $proposal->status_persetujuan,
                 'file_proposal' => $proposal->file_proposal,
                 'created_at' => $proposal->created_at,
                 'nama_pengaju' => $proposal->user->name,
                 'file_final' => $proposal->file_final,
                 'file_final_sekjen' => $proposal->file_final_sekjen,
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function direvisi()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('komisi_checked_by', $userId)
        ->where('status', 'komisi')
        ->where('status_persetujuan', 'direvisi')
        ->where('status_persetujuan', 'direvisi')
        ->where('is_checked', 1)
        ->get();
         $proposalData = [];
         foreach ($proposals as $proposal) {
             $proposalData[] = [
                 'id' => $proposal->id,
                 'judul' => $proposal->judul,
                 'deskripsi' => $proposal->deskripsi,
                 'status' => $proposal->status,
                 'komisi_checked_by' => $proposal->komisi_checked_by,
                 'status_persetujuan' => $proposal->status_persetujuan,
                 'file_proposal' => $proposal->file_proposal,
                 'created_at' => $proposal->created_at,
                 'nama_pengaju' => $proposal->user->name,
                 'file_final' => $proposal->file_final,
                 'file_final_sekjen' => $proposal->file_final_sekjen,
             ];
         }
        return view('komisi.transparansi.proposal_direvisi', compact('proposalData'));
    }
    public function disetujui()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('komisi_checked_by', $userId)
                                    ->where(function ($query) {
                                        $query->where('status', 'badan anggaran')
                                              ->orWhere('status', 'sekjen');
                                    })
                                    ->get();        
         $proposalData = [];
         foreach ($proposals as $proposal) {
             $proposalData[] = [
                 'id' => $proposal->id,
                 'judul' => $proposal->judul,
                 'deskripsi' => $proposal->deskripsi,
                 'status' => $proposal->status,
                 'komisi_checked_by' => $proposal->komisi_checked_by,
                 'status_persetujuan' => $proposal->status_persetujuan,
                 'file_proposal' => $proposal->file_proposal,
                 'created_at' => $proposal->created_at,
                 'nama_pengaju' => $proposal->user->name,
                 'file_final' => $proposal->file_final,
                 'file_final_sekjen' => $proposal->file_final_sekjen,
             ];
         }
        return view('komisi.transparansi.proposal_disetujui', compact('proposalData'));
    }
    public function ditolak()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('komisi_checked_by', $userId)
        ->where('status', 'komisi')
        ->where('status_persetujuan', 'rejected')

        ->get();
         $proposalData = [];
         foreach ($proposals as $proposal) {
             $proposalData[] = [
                 'id' => $proposal->id,
                 'judul' => $proposal->judul,
                 'deskripsi' => $proposal->deskripsi,
                 'status' => $proposal->status,
                 'komisi_checked_by' => $proposal->komisi_checked_by,
                 'status_persetujuan' => $proposal->status_persetujuan,
                 'file_proposal' => $proposal->file_proposal,
                 'created_at' => $proposal->created_at,
                 'nama_pengaju' => $proposal->user->name,
                 'file_final' => $proposal->file_final,
                 'file_final_sekjen' => $proposal->file_final_sekjen,
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function adminReject(Request $request, $proposalId)
    {try {
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $ormawaName = User::findOrFail($proposal->created_by)->name;
        $ormawaemail = User::findOrFail($proposal->created_by)->email;
        $proposal->update([
            'status'=> 'komisi',
            'status_persetujuan'=> 'rejected',
            'is_checked'=> true,
        ]);
        $namaKomisi = User::where('id', Auth::id())->value('name');

        $log = new LogProposal();
        $log->action = 'Pengajuan ditolak oleh Komisi';
        $log->keterangan = 'Pengajuan ditolak oleh komisi ' . $namaKomisi;
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();
        
        $mailController = new MailController();
        $to = $ormawaemail;
        $subject = 'Pengajuan Proposal Ditolak oleh ' . Auth::user()->name;
        $body = 'Pengajuan anda ditolak. <br>' .
        'Judul Proposal: ' . $proposal->judul . '<br>' .
        'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
        'Tanggal Diajukan: ' . $proposal->created_at . '<br>' .
        'Nama Ormawa: ' . $ormawaName . '<br>'.
        'Silakan unduh file proposal di sini: <a href="' . asset('storage/' . $proposal->file_proposal) . '">Download Proposal</a>';
        $mailController->sendEmail($to, $subject, $body);
        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
        
    } catch (\Exception $e) {
        return response_error(null, $e->getMessage(), $e->getCode());
    }

        
    }

    public function adminApprove(Request $request, $proposalId)
    {

        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $ormawaName = User::findOrFail($proposal->created_by)->name;
        
        $badanAnggaranUsers = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'badan-anggaran');
        })->get();

        
        $badanAnggaranEmails = $badanAnggaranUsers->pluck('email')->toArray();
        $proposal->update([
            'status'=> 'badan anggaran',
            'status_persetujuan'=> 'pending',
        ]);
        $namaKomisi = User::where('id', Auth::id())->value('name');
        $log = new LogProposal();
        $log->action = 'Pengajuan disetujui oleh Komisi' . $namaKomisi;
        $log->keterangan = 'Pengajuan ditolak oleh komisi berlanjut ke Badan Anggaran';
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();
        $mailController = new MailController();
        $to = $badanAnggaranEmails;
        $subject = 'Pemeriksaan Badan Anggaran | Pengajuan Proposal oleh ' . $ormawaName;
        $body = 'Pengajuan ini telah disetujui oleh '. Auth::user()->name. '<br>' .
        'Judul Proposal: ' . $proposal->judul . '<br>' .
        'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
        'Tanggal Diajukan: ' . $proposal->created_at . '<br>' .
        'Nama Ormawa: ' . $ormawaName . '<br>'.
        'Silakan unduh file proposal di sini: <a href="' . asset('storage/' . $proposal->file_proposal) . '">Download Proposal</a>';
        $mailController->sendEmail($to, $subject, $body);
        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
    }

    public function listRevisi(Request $request, $proposalId)
    {
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $riwayatRevisi = RiwayatRevisiOrmawa::where('proposal_id', $proposalId)->get();
        $revisiProposals = RevisiProposal::where('proposal_id', $proposalId)->get();
        return view('komisi.transparansi.list_revisi', compact('proposal', 'revisiProposals','riwayatRevisi'));
    }

    public function viewCreateRevisi($proposalId)
    {
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        return view('komisi.transparansi.create_revisi', compact('proposal'));
    }

    public function createRevisi(Request $request, $proposalId)
    {
        $request->validate([
            'komentar' => 'required|string',
            'file_revisi' => 'nullable|file|mimes:doc,docx',
        ]);
    
        $user_id = Auth::id();
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $ormawaUser = User::findOrFail($proposal->created_by);
        $nama_ormawa = $ormawaUser->name;
        $nama_komisi = Auth::user()->name; // Asumsi nama komisi diambil dari user yang sedang login
        $tanggal_revisi = now()->format('Ymd');
    
        // Menghitung nomor revisi
        $nomor_revisi = RevisiProposal::where('proposal_id', $proposalId)->count() + 1;
    
        // Membuat nama file revisi sesuai format yang diinginkan
        $nama_file_revisi = "Proposal{$proposalId}-{$nama_ormawa}-Revisi{$nomor_revisi}_{$nama_komisi}-{$tanggal_revisi}.";
    
        // Menyimpan file revisi jika ada
        $file_revisi_path = null;
        if ($request->hasFile('file_revisi')) {
            $file_revisi_path = $request->file('file_revisi')->storeAs('revisi_files', $nama_file_revisi, 'public');
        }
    
        // Buat entri baru untuk RevisiProposal
        $revisiProposal = new RevisiProposal();
        $revisiProposal->proposal_id = $proposalId;
        $revisiProposal->komentar = $request->komentar;
        $revisiProposal->revised_by = $user_id;
        $revisiProposal->is_revision_done_by_ormawa = false;
        $revisiProposal->file_revisi = $file_revisi_path;
        $revisiProposal->save();
    
        // Mengupdate status proposal
        $proposal->update([
            'status' => 'komisi',
            'status_persetujuan' => 'direvisi',
            'is_checked' => true
        ]);
    
        // Menyimpan riwayat revisi ormawa
        RiwayatRevisiOrmawa::create([
            'proposal_id' => $proposalId,
            'revisi_id' => $revisiProposal->id,
            'judul_lama' => $proposal->judul,
            'deskripsi_lama' => $proposal->deskripsi,
            'file_lama' => $proposal->file_proposal,
        ]);
    
        // Menyimpan log
        $log = new LogProposal();
        $log->action = 'Proposal direvisi oleh Komisi';
        $log->keterangan = 'Proposal direvisi oleh Komisi ' . $nama_komisi;
        $log->proposal_id = $proposalId;
        $log->user_id = $user_id;
        $log->save();
    
        // Mengirim email pemberitahuan
        $mailController = new MailController();
        $to = $ormawaUser->email;
        $subject = 'Proposal Direvisi oleh ' . $nama_komisi;
        $body = 'Proposal Anda telah direvisi oleh Komisi. Silakan unduh file revisi dan file proposal lama untuk informasi lebih lanjut.' . '<br>' .
            'Judul Proposal: ' . $proposal->judul . '<br>' .
            'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
            'Komentar Komisi: ' . $request->komentar . '<br>' .
            'File Proposal Lama: <a href="' . Storage::url($proposal->file_proposal) . '">' . basename($proposal->file_proposal) . '</a>' . '<br>';
    
        if ($file_revisi_path) {
            $body .= 'File Revisi: <a href="' . Storage::url($file_revisi_path) . '">' . $nama_file_revisi . '</a>';
        }
    
        $mailController->sendEmail($to, $subject, $body);
    
        $user_role_slug = auth()->user()->role->role_slug;
    
        return redirect()->route($user_role_slug . '.proposal.revisi', $proposalId)->with('success', 'Agenda kerja berhasil dibuat!');
    }
    

    
}
