<?php

namespace App\Http\Controllers;

use App\Models\JDIH;
use Illuminate\Http\Request;

class JDIHController extends Controller
{
    public function getJDIH()
    {
        try {
            $jdihByYear = JDIH::where('is_deleted', false)
                ->orderBy('tahun', 'DESC')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->groupBy('tahun');
    
            return view('jdih', compact('jdihByYear'));
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
    }
    public function jenis($id)
    {
        try {
            $jdihByYear = JDIH::where('is_deleted', false)
                ->where('jenis_jdih_id', $id)
                ->orderBy('tahun', 'DESC')
                ->orderBy('created_at', 'DESC')
                ->get()
                ->groupBy('tahun');

            return view('jdih', compact('jdihByYear', 'id'));
        } catch (\Exception $e) {
            return response_error(null, $e->getMessage(), $e->getCode());
        }
    }
   // JDIHAdminCtrl.php

public function showJDIH($id)
{
    $jdihRecord = JDIH::findOrFail($id);
    return view('detailJDIH', compact('jdihRecord'));
}

}
