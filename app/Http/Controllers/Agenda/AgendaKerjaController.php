<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaKerja;
use Illuminate\Support\Facades\Auth;

class AgendaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user_id = auth()->id();
        $agendas = AgendaKerja::where('user_id', $user_id)->get();

        return view('agenda.agendakerja', compact('agendas'));
    }

    /**
     * Menampilkan formulir untuk membuat agenda kerja baru.
     */
    public function showCreate()
    {
        return view('agenda.create-agenda');
    }

    /**
     * Menyimpan agenda kerja baru ke database.
     */


     public function store(Request $request)
     {
         // Validasi data yang diterima dari formulir
         $validatedData = $request->validate([
             'nama' => 'required|string|max:255',
             'status' => 'nullable|boolean', // Ubah menjadi boolean
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
         
         // Tangkap role slug dari pengguna yang sedang login
         $user_role_slug = auth()->user()->role->role_slug;
     
         // Redirect ke halaman agenda kerja dengan menggunakan role slug dalam URL route
         return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil dibuat!');
     }
     
    /**
     * Menampilkan formulir untuk mengedit agenda kerja.
     */
    public function showEdit($id)
    {
        $agenda = AgendaKerja::findOrFail($id);
        return view('agenda.edit-agenda', compact('agenda'));
    }

    /**
     * Menyimpan perubahan pada agenda kerja ke database.
     */
    public function update(Request $request, $id)
{
        $agenda = AgendaKerja::findOrFail($id);
    
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'nullable|boolean', 
            'file' => 'nullable|file',
            'tanggal_pelaksanaan' => 'required|date',
        ]);
        if (!isset($validatedData['status'])) {
            $validatedData['status'] = false;
        }
    
        // Update agenda kerja dengan data yang baru
        $agenda->nama = $validatedData['nama'];
        $agenda->status = $validatedData['status'];
        $agenda->tanggal_pelaksanaan = $validatedData['tanggal_pelaksanaan'];
        
        // Jika ada file yang diunggah, perbarui file
        if ($request->hasFile('file')) {
            $agenda->file = $validatedData['file']->store('files', 'public');
        }
    
        $agenda->save();
        $user_role_slug = auth()->user()->role->role_slug;
    
        // Redirect ke halaman agenda kerja
        return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil diperbarui!');

}

    /**
     * Menghapus agenda kerja dari database.
     */
    public function destroy($id)
    {
        $agenda = AgendaKerja::findOrFail($id);
        $agenda->delete();
        $user_role_slug = auth()->user()->role->role_slug;

        // Redirect ke halaman agenda kerja
        return redirect()->route($user_role_slug . '.agenda.index')->with('success', 'Agenda kerja berhasil dihapus!');
    }
}
