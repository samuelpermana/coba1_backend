<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiAdminCtrl extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::all();
        return view('cms.aspirasi', compact('aspirasis'));
    }

    public function update(Request $request, $id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        
        $request->validate([
            'is_actived' => 'required|boolean',
            'tipe_aspirasi_id' => 'required|integer',
            'answer' => 'nullable|string',
        ]);

        $aspirasi->update([
            'is_actived' => $request->input('is_actived'),
            'tipe_aspirasi_id' => $request->input('tipe_aspirasi_id'),
            'answer' => $request->input('answer'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Aspiration updated successfully');
    }

    public function delete($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('admin.index')->with('success', 'Aspiration deleted successfully');
    }
}
