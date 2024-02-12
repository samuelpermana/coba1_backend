<?php

namespace App\Http\Controllers\AgendaWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaKerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaWebController extends Controller
{
    public function komisi1()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'komisi-i');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('komisi1', compact('agendas'));
    }
}
