<?php

namespace App\Http\Controllers;

use App\Models\RoomSchedule;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomSchedule = RoomSchedule::all();
        return view('peminjamanruangan', compact('roomSchedule'));
    }
}
