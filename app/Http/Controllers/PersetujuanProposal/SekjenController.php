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
use Carbon\Carbon;

class SekjenController extends Controller
{
    public function belumDiperiksa()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('status', 'sekjen')
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
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function direvisi()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('status', 'sekjen')
        ->where('status_persetujuan', 'revised')
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
                 
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }
    public function disetujui()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where(function ($query) {
                                        $query->where('status', 'sekjen');
                                    })
                                    ->where('status_persetujuan', 'approved')
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
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }
    public function ditolak()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('status', 'sekjen')
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
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function adminReject(Request $request, $proposalId)
    {

        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $proposal->update([
            'status'=> 'sekjen',
            'status_persetujuan'=> 'rejected',
            'is_checked'=> true,
            'approved_at' => now(),
        ]);
        $namaKomisi = User::where('id', Auth::id())->value('name');

        $log = new LogProposal();
        $log->action = 'Pengajuan ditolak oleh sekjen';
        $log->keterangan = 'Pengajuan ditolak oleh sekjen ';
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
    }

    public function adminApprove(Request $request, $proposalId)
    {

        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $proposal->update([
            'status'=> 'sekjen',
            'status_persetujuan'=> 'approved',
            'is_checked'=> true,
            'approved_at' => Carbon::now(),
        ]);
        $namaKomisi = User::where('id', Auth::id())->value('name');
        $log = new LogProposal();
        $log->action = 'Pengajuan disetujui oleh ' . $namaKomisi;
        $log->keterangan = 'Pengajuan disetujui oleh Sekjen';
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();
    
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
            'file_revisi' => 'required|file|mimes:doc,docx',
        ]);
    
        $user_id = Auth::id();
    
        $file_revisi_path = $request->file('file_revisi')->store('revisi_files', 'public');
    
        // Buat entri baru untuk RevisiProposal
        $revisiProposal = new RevisiProposal();
        $revisiProposal->proposal_id = $proposalId;
        $revisiProposal->komentar = $request->komentar;
        $revisiProposal->revised_by = $user_id;
        $revisiProposal->is_revision_done_by_ormawa = false;
        $revisiProposal->file_revisi = $file_revisi_path;
        $revisiProposal->save();
    
        $proposal = ProposalOrmawa::findOrFail($proposalId);
        $proposal->update([
            'status' => 'sekjen',
            'status_persetujuan' => 'revised',
            'is_checked'=> true
        ]);
    
        RiwayatRevisiOrmawa::create([
            'proposal_id' => $proposalId,
            'revisi_id' => $revisiProposal->id,
            'judul_lama' => $proposal->judul,
            'deskripsi_lama' => $proposal->deskripsi,
            'file_lama' => $proposal->file_proposal,
        ]);
    
        $namaKomisi = User::where('id', Auth::id())->value('name');
    
        $log = new LogProposal();
        $log->action = 'Proposal direvisi oleh ';
        $log->keterangan = 'Proposal direvisi oleh  ' . $namaKomisi;
        $log->proposal_id = $proposalId;
        $log->user_id = $user_id;
        $log->save();
        return redirect()->back()->with('success', 'Proposal direvisi berhasil disimpan.');
    }
    
}
