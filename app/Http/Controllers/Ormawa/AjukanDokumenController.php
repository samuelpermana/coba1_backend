<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogProposal;
use App\Models\ProposalOrmawa;
use App\Models\RevisiProposal;
use App\Models\RiwayatRevisiOrmawa;
use Auth;
use Carbon\Carbon;

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
            $file_path = $file_proposal->storeAs('proposal_files', $file_proposal->getClientOriginalName(), 'public');
    
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
    
            return redirect()->route('ormawa.cek_progress')->with('success', 'Agenda kerja berhasil dibuat!');
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
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

        $proposal->judul = $request->judul;
        $proposal->tipe = "revisi";
        $proposal->is_checked = false;
        $proposal->deskripsi = $request->deskripsi;
        $proposal->file_proposal = $request->file_proposal->storeAs('proposal_files', $request->file_proposal->getClientOriginalName(), 'public');
        $proposal->save();

        $revisiProposal->is_revision_done_by_ormawa = 1;
        $revisiProposal->save();

        $riwayatRevisi = RiwayatRevisiOrmawa::where('revisi_id', $revisiId)->first();

        if ($riwayatRevisi) {
            $riwayatRevisi->judul_hasil_revisi = $request->judul;
            $riwayatRevisi->deskripsi_hasil_revisi = $request->deskripsi;
            $riwayatRevisi->file_hasil_revisi = $request->file_proposal->store('proposal_files', 'public');
            $riwayatRevisi->save();
        }
        $log = new LogProposal();
        $log->action = 'Kirim Revisi Proposal';
        $log->keterangan = 'Revisi Proposal #' . $revisiProposal->id . ' dikirim oleh ' . Auth::user()->name;
        $log->proposal_id = $proposal->id;
        $log->user_id = Auth::id();
        $log->save();
        return redirect()->route('ormawa.proposal.revisi', ['proposalId' => $proposalId])->with('success', 'Agenda kerja berhasil dibuat!');
        
    } catch (\Exception $e) {
        return response_error(null, $e->getMessage(), $e->getCode());
    }
}
    
public function uploadFileFinal(Request $request, $proposalId)
{
    $request->validate([
        'file_final' => 'required|file|mimes:pdf', 
    ]);

    $proposal = ProposalOrmawa::findOrFail($proposalId);

    if ($request->hasFile('file_final')) {
        $file = $request->file('file_final');
        $file_path = $file->storeAs('file_finals', $file->getClientOriginalName(), 'public');
        $proposal->file_final = $file_path;
        $proposal->save();

        return redirect()->back()->with('success', 'File final berhasil diupload.');
    }

    return redirect()->back()->with('error', 'Gagal mengupload file final.');
}
}
