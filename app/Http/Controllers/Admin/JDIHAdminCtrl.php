<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JDIH;

class JDIHAdminCtrl extends Controller
{
    public function index()
    {
        $jdihRecords = JDIH::all();
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
            'file_peraturan' => 'required|string',
            'file_naskah' => 'nullable|string',
            'file_inventarisasi' => 'nullable|string',
            'file_lainnya' => 'nullable|string',

        ]);

        JDIH::create([
            'tahun' => $request->input('tahun'),
            'jenis_peraturan' => $request->input('jenis_peraturan'),
            'nama_peraturan' => $request->input('nama_peraturan'),
            'tanggal_disahkan' => $request->input('tanggal_disahkan'),
            'peraturan' => $request->input('peraturan'),
            'status_peraturan' => $request->input('status_peraturan'),
            'file_peraturan' => $request->input('file_peraturan'),
            'file_naskah' => $request->input('file_naskah'),
            'file_inventarisasi' => $request->input('file_inventarisasi'),
            'file_lainnya' => $request->input('file_lainnya'),

        ]);

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record created successfully');
    }

    public function show($id)
    {
        $jdihRecord = JDIH::findOrFail($id);
        return view('cms.jdih.show', compact('jdihRecord'));
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
            'file_peraturan' => 'required|string',
            'file_naskah' => 'nullable|string',
            'file_inventarisasi' => 'nullable|string',
            'file_lainnya' => 'nullable|string',
            'is_deleted' => 'required|boolean',
        ]);

        $jdihRecord->update([
            'tahun' => $request->input('tahun'),
            'jenis_peraturan' => $request->input('jenis_peraturan'),
            'nama_peraturan' => $request->input('nama_peraturan'),
            'tanggal_disahkan' => $request->input('tanggal_disahkan'),
            'peraturan' => $request->input('peraturan'),
            'status_peraturan' => $request->input('status_peraturan'),
            'file_peraturan' => $request->input('file_peraturan'),
            'file_naskah' => $request->input('file_naskah'),
            'file_inventarisasi' => $request->input('file_inventarisasi'),
            'file_lainnya' => $request->input('file_lainnya'),
            'is_deleted' => $request->input('is_deleted'),
        ]);
    }

    public function delete($id)
    {
        $jdihRecord = JDIH::findOrFail($id);
        $jdihRecord->delete();

        return redirect()->route('admin.jdih.index')->with('success', 'JDIH record deleted successfully');
    }
}

