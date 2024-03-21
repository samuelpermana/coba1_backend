<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposalOrmawa;
use App\Models\User;
use App\Models\LogProposal;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use Auth;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = ProposalOrmawa::with('user')->latest()->get();

        $komisiUsers = User::whereIn('role_id', [4, 5, 6, 7])->get();

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

        return view('cms.transparansi.index', compact('proposalData', 'komisiUsers'));
    }

    public function updateKomisiCheckedBy(Request $request, $proposalId)
    {
        try {
            $request->validate([
                'komisi_checked_by' => 'required|numeric',
            ]);
        
            $proposal = ProposalOrmawa::findOrFail($proposalId);
        
            $komisiActions = [
                3 => 1,
                4 => 2,
                5 => 3,
                6 => 4,
            ];
        
            $proposal->update([
                'komisi_checked_by' => $request->komisi_checked_by,
                'status' => 'komisi',
                'status_persetujuan' => 'pending',
            ]);
        
            $log = new LogProposal();
            $log->action = 'Penugasan ke Komisi';
            $log->keterangan = 'Proposal akan diperiksa oleh Komisi ' . $komisiActions[$request->komisi_checked_by];
            $log->proposal_id = $proposal->id;
            $log->user_id = Auth::id();
            $log->save();
            
            $komisiMemberEmail = User::findOrFail($request->komisi_checked_by)->email;
            $ormawaName = User::findOrFail($proposal->created_by)->name;
        
            $mailController = new MailController();
            $to = $komisiMemberEmail;
            $subject = 'Pengajuan Proposal oleh ' . $ormawaName;
            $body = 'Judul Proposal: ' . $proposal->judul . '<br>' .
                    'Deskripsi Proposal: ' . $proposal->deskripsi . '<br>' .
                    'Tanggal Diajukan: ' . $proposal->created_at . '<br>' .
                    'Nama Ormawa: ' . $ormawaName . '<br>'.
                    'Silakan unduh file proposal di sini: <a href="' . asset('storage/' . $proposal->file_proposal) . '">Download Proposal</a>';
        
            $mailController->sendEmail($to, $subject, $body);
    
            return redirect()->back()->with('success', 'Komisi berhasil dipilih!');       
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Pemilihan Komisi Gagal!');
        }
    }


    public function adminReject(Request $request, $proposalId)
    {
        $proposal = ProposalOrmawa::findOrFail($proposalId);

        $proposal->update([
            'status' => 'admin',
            'status_persetujuan' => 'rejected',
        ]);

        $log = new LogProposal();
        $log->action = 'Pengajuan ditolak oleh admin';
        $log->keterangan = 'Pengajuan ditolak oleh admin';
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();

        return redirect()->back()->with('success', 'Proposal berhasil ditolak.');
    }
}
