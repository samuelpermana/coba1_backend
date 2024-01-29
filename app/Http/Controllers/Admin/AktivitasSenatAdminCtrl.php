<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktivitasSenat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktivitasSenatAdminCtrl extends Controller

{
    public function index()
    {
        // Retrieve all AktivitasSenat records
        $aktivitasSenats = AktivitasSenat::all();

        return view('cms.aktivitasSenat.index', ['aktivitasSenats' => $aktivitasSenats]);
    }

    public function create()
    {
        return view('cms.aktivitasSenat.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'judul' => 'required',
        'isi_teks' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
    ]);

    // Upload the image file to the "aktivitasSenat" subfolder
    if ($request->hasFile('gambar')) {
        $subfolder = 'aktivitasSenat';
        $gambarPath = $request->file('gambar')->store("public/{$subfolder}");
    } else {
        $gambarPath = null;
    }

    // Create a new AktivitasSenat record
    AktivitasSenat::create([
        'judul' => $request->input('judul'),
        'isi_teks' => $request->input('isi_teks'),
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('admin.aktivitasSenat.index')->with('success', 'Aktivitas created successfully');
}

    public function show($id)
    {
        $aktivitasSenat = AktivitasSenat::findOrFail($id);

        return view('cms.aktivitasSenat.show', ['aktivitasSenat' => $aktivitasSenat]);
    }

    public function edit($id)
    {
        $aktivitasSenat = AktivitasSenat::findOrFail($id);

        return view('cms.aktivitasSenat.edit', ['aktivitasSenat' => $aktivitasSenat]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'judul' => 'required',
            'isi_teks' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
        ]);

        // Find the AktivitasSenat record
        $aktivitasSenat = AktivitasSenat::findOrFail($id);

        // Upload the new image file if provided
        if ($request->hasFile('gambar')) {
            // Delete the old image file
            Storage::delete($aktivitasSenat->gambar);

            // Upload the new image file
            $gambarPath = $request->file('gambar')->store('public/images');
        } else {
            $gambarPath = $aktivitasSenat->gambar;
        }

        // Update the AktivitasSenat record
        $aktivitasSenat->update([
            'judul' => $request->input('judul'),
            'isi_teks' => $request->input('isi_teks'),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.aktivitasSenat.index')->with('success', 'Aktivitas updated successfully');
    }

    public function destroy($id)
{
    // Find the AktivitasSenat record
    $aktivitasSenat = AktivitasSenat::findOrFail($id);

    // Check if the image file exists before attempting to delete
    if ($aktivitasSenat->gambar && Storage::exists($aktivitasSenat->gambar)) {
        // Delete the image file
        Storage::delete($aktivitasSenat->gambar);
    }

    // Delete the AktivitasSenat record
    $aktivitasSenat->delete();

    return redirect()->route('admin.aktivitasSenat.index')->with('success', 'Aktivitas deleted successfully');
}

}

