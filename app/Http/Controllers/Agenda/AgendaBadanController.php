<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaKerja;
use Illuminate\Support\Facades\Auth;

class AgendaBadanController extends Controller
{

    public function index()
    {   
        $user_id = auth()->id();
        $agendas = AgendaKerja::where('user_id', $user_id)->get();

        return view('agenda-badan.agendakerja', compact('agendas'));
    }

    public function showCreate()
    {
        return view('agenda-badan.create-agenda');
    }

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nama' => 'required|string|max:255',
             'status' => 'nullable|boolean',
             'deskripsi'=>'required|string',
             'file' => 'nullable|file',
             'tanggal_pelaksanaan' => 'nullable|date',
         ]);
         if (!isset($validatedData['status'])) {
             $validatedData['status'] = false;
         }
     
         $user_id = Auth::id();
         $file_path = null;

         if ($request->hasFile('file')) {
             $file_path = $validatedData['file']->store('files', 'public');
         }
     
         AgendaKerja::create([
             'user_id' => $user_id,
             'nama' => $validatedData['nama'],
             'deskripsi' => $validatedData['deskripsi'],
             'status' => $validatedData['status'],
             'file' =>  $file_path,
             'tanggal_pelaksanaan' => $validatedData['tanggal_pelaksanaan'],

         ]);
         
        
         $user_role_slug = auth()->user()->role->role_slug;
     
         return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil dibuat!');
     }
     
    public function showEdit($id)
    {
        $agenda = AgendaKerja::findOrFail($id);
        return view('agenda-badan.edit-agenda', compact('agenda'));
    }
    public function update(Request $request, $id)
{
        $agenda = AgendaKerja::findOrFail($id);
    
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'nullable|boolean',
            'file' => 'nullable|file',
            'tanggal_pelaksanaan' => 'date',
        ]);
        if (!isset($validatedData['status'])) {
            $validatedData['status'] = false;
        }
    
        $agenda->nama = $validatedData['nama'];
        $agenda->deskripsi = $validatedData['deskripsi'];
        $agenda->status = $validatedData['status'];
        $agenda->tanggal_pelaksanaan = $validatedData['tanggal_pelaksanaan'];
        if ($request->hasFile('file')) {
            $agenda->file = $validatedData['file']->store('files', 'public');
        }
    
        $agenda->save();
        $user_role_slug = auth()->user()->role->role_slug;
        return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agenda = AgendaKerja::findOrFail($id);
        $agenda->delete();
        $user_role_slug = auth()->user()->role->role_slug;
        return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil dihapus!');
    }
}
