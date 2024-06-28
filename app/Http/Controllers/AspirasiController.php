<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AspirasiRequest;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Redirect;

class AspirasiController extends Controller
{
    
    public function createAspirasi(AspirasiRequest $request)
    {
        try {
            $aspirasi = new Aspirasi([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'angkatan' => $request->input('angkatan'), 
                'id_line' => $request->input('id_line'),
                'message' => $request->input('message'),
            ]);
            
            $aspirasi->save();
            
            return Redirect::back()->with('success', 'Aspirasi berhasil dibuat');
        } catch (Exception $e) {
            return Redirect::back()->with('error', 'Terjadi kesalahan saat membuat aspirasi: ' . $e->getMessage());
        }
    }

    public function getAspirasi()
{
    try {
        $aspirasis = Aspirasi::where('is_deleted', false)
            ->where('is_actived', true) // Menambahkan kondisi is_active
            ->whereNotNull('answer') // Menambahkan kondisi answer terisi
            ->whereNotNull('tipe_aspirasi_id') // Menambahkan kondisi tipe_id terisi
            ->orderBy('created_at', 'DESC')
            ->get();

        $sarpras = $aspirasis->where('tipe_aspirasi_id', 1); // Gantilah 1 dengan ID tipe_aspirasi yang sesuai dengan Sarpras
        $birokrasi = $aspirasis->where('tipe_aspirasi_id', 2); // Gantilah 2 dengan ID tipe_aspirasi yang sesuai dengan Birokrasi
        $akademik = $aspirasis->where('tipe_aspirasi_id', 3); // Gantilah 3 dengan ID tipe_aspirasi yang sesuai dengan Akademik

        return view('bankaspirasi', compact('sarpras', 'birokrasi', 'akademik'));
    } catch (\Exception $e) {
        return response_error(null, $e->getMessage(), $e->getCode());
        }
}

}
