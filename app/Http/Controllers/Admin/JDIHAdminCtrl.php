<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JDIH;
use Illuminate\Support\Facades\Storage;

class JDIHAdminCtrl extends Controller
{
    public function index()
    {
        // Mengambil data JDIH beserta file lainnya
        $jdihRecords = JDIH::with('file_lain')->get();
    
        return view('cms.jdih.index', compact('jdihRecords'));
    }
    public function create()
    {
        return view('cms.jdih.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'jenis_peraturan' => 'required|string',
            'nama_peraturan' => 'required|string',
            'tanggal_disahkan' => 'required|date',
            'peraturan' => 'required|string',
            'status_peraturan' => 'required|string',
            'file_peraturan' => 'required|file|mimes:pdf',
            'file_naskah' => 'nullable|file|mimes:pdf',
            'file_inventarisasi' => 'nullable|file|mimes:pdf',
            'file_lainnya.*' => 'nullable|file|mimes:pdf',
        ]);

        $jdih = JDIH::create([
            'tahun' => $request->input('tahun'),
            'jenis_peraturan' => $request->input('jenis_peraturan'),
            'nama_peraturan' => $request->input('nama_peraturan'),
            'tanggal_disahkan' => $request->input('tanggal_disahkan'),
            'peraturan' => $request->input('peraturan'),
            'status_peraturan' => $request->input('status_peraturan'),
        ]);

        // Store file_peraturan
        $filePeraturanPath = $request->file('file_peraturan')->store('jdih', 'public');
        $jdih->update(['file_peraturan' => $filePeraturanPath]);

        // Store file_naskah
        if ($request->hasFile('file_naskah')) {
            $fileNaskahPath = $request->file('file_naskah')->store('jdih', 'public');
            $jdih->update(['file_naskah' => $fileNaskahPath]);
        }

        // Store file_inventarisasi
        if ($request->hasFile('file_inventarisasi')) {
            $fileInventarisasiPath = $request->file('file_inventarisasi')->store('jdih', 'public');
            $jdih->update(['file_inventarisasi' => $fileInventarisasiPath]);
        }

        // Store file_lainnya
        if ($request->hasFile('file_lainnya')) {
            foreach ($request->file('file_lainnya') as $file) {
                $filePath = $file->store('jdih', 'public');
                $jdih->file_lain()->create(['nama_file' => $filePath]);
            }
        }

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record created successfully');
    }

    public function show($id)
    {
        $jdihRecord = JDIH::findOrFail($id);
        return view('cms.jdih.show', compact('jdihRecord'));
    }

    public function edit($id)
{
    // Mengambil data JDIH berdasarkan ID
    $jdihRecord = JDIH::findOrFail($id);
    
    // Mengembalikan view edit dengan data JDIH yang akan diedit
    return view('cms.jdih.edit', compact('jdihRecord'));
}

public function update(Request $request, $id)
{
    $jdihRecord = JDIH::findOrFail($id);

    $request->validate([
        'tahun' => 'required|integer',
        'jenis_peraturan' => 'required|string',
        'nama_peraturan' => 'required|string',
        'tanggal_disahkan' => 'required|date',
        'peraturan' => 'required|string',
        'status_peraturan' => 'required|string',
        'file_peraturan' => 'nullable|file|mimes:pdf',
        'file_naskah' => 'nullable|file|mimes:pdf',
        'file_inventarisasi' => 'nullable|file|mimes:pdf',
        'file_lainnya.*' => 'nullable|file|mimes:pdf',
    ]);

    $data = [
        'tahun' => $request->input('tahun'),
        'jenis_peraturan' => $request->input('jenis_peraturan'),
        'nama_peraturan' => $request->input('nama_peraturan'),
        'tanggal_disahkan' => $request->input('tanggal_disahkan'),
        'peraturan' => $request->input('peraturan'),
        'status_peraturan' => $request->input('status_peraturan'),
    ];

    // Update file_peraturan
    if ($request->hasFile('file_peraturan')) {
        Storage::disk('public')->delete($jdihRecord->file_peraturan);
        $filePeraturanPath = $request->file('file_peraturan')->store('jdih', 'public');
        $data['file_peraturan'] = $filePeraturanPath;
    }

    // Update file_naskah
    if ($request->hasFile('file_naskah')) {
        Storage::disk('public')->delete($jdihRecord->file_naskah);
        $fileNaskahPath = $request->file('file_naskah')->store('jdih', 'public');
        $data['file_naskah'] = $fileNaskahPath;
    }

    // Update file_inventarisasi
    if ($request->hasFile('file_inventarisasi')) {
        Storage::disk('public')->delete($jdihRecord->file_inventarisasi);
        $fileInventarisasiPath = $request->file('file_inventarisasi')->store('jdih', 'public');
        $data['file_inventarisasi'] = $fileInventarisasiPath;
    }

    // Update file_lainnya
    if ($request->hasFile('file_lainnya')) {
        foreach ($jdihRecord->file_lain as $file) {
            Storage::disk('public')->delete($file->nama_file);
            $file->delete();
        }

        foreach ($request->file('file_lainnya') as $file) {
            $filePath = $file->store('jdih', 'public');
            $jdihRecord->file_lain()->create(['nama_file' => $filePath]);
        }
    }

    $jdihRecord->update($data);

    return redirect()->route('admin.jdih.index')->with('success', 'JDIH record updated successfully');
}



    public function delete($id)
    {
        $jdihRecord = JDIH::findOrFail($id);

        // Delete file peraturan
        Storage::disk('public')->delete($jdihRecord->file_peraturan);

        // Delete file naskah
        if ($jdihRecord->file_naskah) {
            Storage::disk('public')->delete($jdihRecord->file_naskah);
        }

        // Delete file inventarisasi
        if ($jdihRecord->file_inventarisasi) {
            Storage::disk('public')->delete($jdihRecord->file_inventarisasi);
        }

        // Delete file lainnya
        foreach ($jdihRecord->file_lain as $file) {
            Storage::disk('public')->delete($file->nama_file);
            $file->delete();
        }

        $jdihRecord->delete();

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record deleted successfully');
    }
}
