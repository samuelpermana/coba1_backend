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
    public function komisi2()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'komisi-ii');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('komisi2', compact('agendas'));
    }
    public function komisi3()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'komisi-iii');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('komisi3', compact('agendas'));
    }
    public function komisi4()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'komisi-iv');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('komisi4', compact('agendas'));
    }
    public function badanAnggaran()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'badan-anggaran');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('badananggaran', compact('agendas'));
    }
    public function badanKehormatan()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'badan-kehormatan');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('badankehormatan', compact('agendas'));
    }
    public function badanLegislasi()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'badan-legislasi');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('badanlegislasi', compact('agendas'));
    }
    public function Bksap()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'bksap');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('bksap', compact('agendas'));
    }
    public function burt()
    {   
        $users = User::whereHas('role', function ($query) {
            $query->where('role_slug', 'burt');
        })->get();

        $agendas = [];
        foreach ($users as $user) {
            $agendas[$user->name] = AgendaKerja::where('user_id', $user->id)->get();
        }

        // return response()->json(['agendas' => $agendas]);
        return view('burt', compact('agendas'));
    }
}
