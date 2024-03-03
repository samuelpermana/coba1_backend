<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposalOrmawa;
use App\Models\User;
use App\Models\LogProposal;
use Illuminate\Http\Request;
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
                'nama_pengaju' => $proposal->user->name
            ];
        }

        return view('cms.transparansi.index', compact('proposalData', 'komisiUsers'));
    }


    public function updateKomisiCheckedBy(Request $request, $proposalId)
    {
        $request->validate([
            'komisi_checked_by' => 'required|numeric',
        ]);

        $proposal = ProposalOrmawa::findOrFail($proposalId);

        $komisiActions = [
            21 => 1,
            22 => 2,
            23 => 3,
            24 => 4,
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

        $assignedUser = User::where('id', $request->komisi_checked_by);
        $email = $assignedUser->email();
        return response_success($email, "Successfully get list post DPP");
        // Send notification with dynamic recipient
        if ($assignedUser) {
            $this->sendAssignmentNotification($assignedUser, $proposal);
        } else {
            logger('No user found for commission: ' . $request->komisi_checked_by);
        }

        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
    }

    private function sendAssignmentNotification($assignedUser, $proposal)
    {
        try {
            $subject = 'New Proposal Assigned to Your Commission';
            $body = 'A new proposal titled "' . $proposal->judul . '" has been assigned to your commission for review.';
    
            Mail::to($assignedUser->email)->send(new ProposalAssignmentMail($subject, $body));
        } catch (\Exception $e) {
            logger('Error sending email: ' . $e->getMessage());
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

        return redirect()->back()->with('success', 'Komisi checked by berhasil diperbarui.');
    }
}
