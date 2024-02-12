<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaKerja;
use Illuminate\Support\Facades\Auth;

class AgendaKerjaController extends Controller
{

    public function index()
    {   
        $user_id = auth()->id();
        $agendas = AgendaKerja::where('user_id', $user_id)->get();

        return view('agenda-komisi.agendakerja', compact('agendas'));
    }

    public function showCreate()
    {
        return view('agenda-komisi.create-agenda');
    }

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'nama' => 'required|string|max:255',
             'status' => 'nullable|boolean', 
             'file' => 'required|file',
             'tanggal_pelaksanaan' => 'required|date',
         ]);
         if (!isset($validatedData['status'])) {
             $validatedData['status'] = false;
         }
     
         $user_id = Auth::id();
     
         AgendaKerja::create([
             'user_id' => $user_id,
             'nama' => $validatedData['nama'],
             'status' => $validatedData['status'],
             'file' => $validatedData['file']->store('files', 'public'),
             'tanggal_pelaksanaan' => $validatedData['tanggal_pelaksanaan'],

         ]);
         
        
         $user_role_slug = auth()->user()->role->role_slug;
     
         return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil dibuat!');
     }
     
    public function showEdit($id)
    {
        $agenda = AgendaKerja::findOrFail($id);
        return view('agenda-komisi.edit-agenda', compact('agenda'));
    }

    public function update(Request $request, $id)
{
        $agenda = AgendaKerja::findOrFail($id);
    
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'nullable|boolean', 
            'file' => 'nullable|file',
            'tanggal_pelaksanaan' => 'required|date',
        ]);
        if (!isset($validatedData['status'])) {
            $validatedData['status'] = false;
        }
    
        $agenda->nama = $validatedData['nama'];
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
