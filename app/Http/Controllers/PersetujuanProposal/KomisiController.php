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
                 'nama_pengaju' => $proposal->user->name
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function direvisi()
    {
        $userId = Auth::id();
        $proposals = ProposalOrmawa::where('komisi_checked_by', $userId)
        ->where('status', 'komisi')
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
                 'nama_pengaju' => $proposal->user->name
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
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
                 'nama_pengaju' => $proposal->user->name
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
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
                 'nama_pengaju' => $proposal->user->name
             ];
         }
        return view('komisi.transparansi.transparansisurat', compact('proposalData'));
    }

    public function adminReject(Request $request, $proposalId)
    {

        $proposal = ProposalOrmawa::findOrFail($proposalId);
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
        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
    }

    public function adminApprove(Request $request, $proposalId)
    {

        $proposal = ProposalOrmawa::findOrFail($proposalId);
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

    $file_revisi_path = $request->file('file_revisi')->storeAs('revisi_files', 'RevisiKomisi_' . $request->file('file_revisi')->getClientOriginalName(), 'public');

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
        'status' => 'komisi',
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
    $log->action = 'Proposal direvisi oleh Komisi';
    $log->keterangan = 'Proposal direvisi oleh Komisi ' . $namaKomisi;
    $log->proposal_id = $proposalId;
    $log->user_id = $user_id;
    $log->save();
    $user_role_slug = auth()->user()->role->role_slug;
    return redirect()->route($user_role_slug . '.proposal.revisi', $proposalId)->with('success', 'Agenda kerja berhasil dibuat!');
}

    
}
