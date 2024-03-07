<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JDIH;
use App\Models\JenisJdih;
use App\Models\FileLainJDIH;
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
        $jenisJDIH = JenisJdih::all(); 
        return view('cms.jdih.create', compact('jenisJDIH'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'jenis_jdih_id' => 'required',
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
            'jenis_jdih_id' => $request->input('jenis_jdih_id'),
            'nama_peraturan' => $request->input('nama_peraturan'),
            'tanggal_disahkan' => $request->input('tanggal_disahkan'),
            'peraturan' => $request->input('peraturan'),
            'status_peraturan' => $request->input('status_peraturan'),
        ]);

        // Store file_peraturan
        $filePeraturanPath = $request->file('file_peraturan')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_peraturan')), 'public');
        $jdih->update(['file_peraturan' => $filePeraturanPath]);

        // Store file_naskah
        if ($request->hasFile('file_naskah')) {
            $fileNaskahPath = $request->file('file_naskah')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_naskah')), 'public');
            $jdih->update(['file_naskah' => $fileNaskahPath]);
        }

        // Store file_inventarisasi
        if ($request->hasFile('file_inventarisasi')) {
            $fileInventarisasiPath = $request->file('file_inventarisasi')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_inventarisasi')), 'public');
            $jdih->update(['file_inventarisasi' => $fileInventarisasiPath]);
        }

        // Store file_lainnya
        if ($request->hasFile('file_lainnya')) {
            foreach ($request->file('file_lainnya') as $file) {
                $filePath = $file->storeAs('jdih', $this->generateUniqueFileName($file), 'public');
                $jdih->file_lain()->create(['nama_file' => $filePath]);
            }
        }

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record created successfully');
    }

    public function edit($id)
    {
        $jenisJDIH = JenisJdih::all();
        $jdihRecord = JDIH::findOrFail($id);
        return view('cms.jdih.edit', compact('jdihRecord', 'jenisJDIH'));
    }

    public function update(Request $request, $id)
    {
        $jdihRecord = JDIH::findOrFail($id);

        $request->validate([
            'tahun' => 'required|integer',
            'jenis_jdih_id' => 'required',
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
            'jenis_jdih_id' => $request->input('jenis_jdih_id'),
            'nama_peraturan' => $request->input('nama_peraturan'),
            'tanggal_disahkan' => $request->input('tanggal_disahkan'),
            'peraturan' => $request->input('peraturan'),
            'status_peraturan' => $request->input('status_peraturan'),
        ];

        // Update file_peraturan
        if ($request->hasFile('file_peraturan')) {
            Storage::disk('public')->delete($jdihRecord->file_peraturan);
            $filePeraturanPath = $request->file('file_peraturan')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_peraturan')), 'public');
            $data['file_peraturan'] = $filePeraturanPath;
        }

        // Update file_naskah
        if ($request->hasFile('file_naskah')) {
            Storage::disk('public')->delete($jdihRecord->file_naskah);
            $fileNaskahPath = $request->file('file_naskah')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_naskah')), 'public');
            $data['file_naskah'] = $fileNaskahPath;
        }

        // Update file_inventarisasi
        if ($request->hasFile('file_inventarisasi')) {
            Storage::disk('public')->delete($jdihRecord->file_inventarisasi);
            $fileInventarisasiPath = $request->file('file_inventarisasi')->storeAs('jdih', $this->generateUniqueFileName($request->file('file_inventarisasi')), 'public');
            $data['file_inventarisasi'] = $fileInventarisasiPath;
        }

        // Menghapus file-file yang dipilih oleh pengguna
        if ($request->has('file_to_delete')) {
            foreach ($request->input('file_to_delete') as $fileId) {
                $file = FileLainJDIH::findOrFail($fileId);
                Storage::disk('public')->delete($file->nama_file);
                $file->delete();
            }
        }

        // Update file_lainnya
        if ($request->hasFile('file_lainnya')) {
            foreach ($jdihRecord->file_lain as $file) {
                Storage::disk('public')->delete($file->nama_file);
                $file->delete();
            }

            foreach ($request->file('file_lainnya') as $file) {
                $filePath = $file->storeAs('jdih', $this->generateUniqueFileName($file), 'public');
                $jdihRecord->file_lain()->create(['nama_file' => $filePath]);
            }
        }

        $jdihRecord->update($data);

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record updated successfully');
    }

    public function deleteFile($id) {
        $file = File::findOrFail($id);
        Storage::delete($file->nama_file);
        $file->delete();

        return redirect()->back()->with('success', 'File berhasil dihapus.');
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

    private function generateUniqueFileName($file) {
        return hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
    }
}
