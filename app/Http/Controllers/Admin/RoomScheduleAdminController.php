<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomSchedule;
use Illuminate\Http\Request;

class RoomScheduleAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomSchedules = RoomSchedule::all();
        return view('cms.roomSchedule.index', compact('roomSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('cms.roomSchedule.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'booked_by' => 'required|string',
        ]);

        // Check if room schedule with the same room, date, and time exists
        $existingSchedule = RoomSchedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->where('start_time', $request->start_time)
            ->where('end_time', $request->end_time)
            ->first();

        if ($existingSchedule) {
            return redirect()->back()->withInput()->with('error', 'Failed to create room schedule. The room is already booked for the selected date and time.');
        }

        RoomSchedule::create($request->all());

        return redirect()->route('admin.room-schedules.index')
            ->with('success', 'Room schedule created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomSchedule $roomSchedule)
    {
        $rooms = Room::all();
        return view('cms.roomSchedule.edit', compact('roomSchedule', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomSchedule $roomSchedule)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'booked_by' => 'required|string',
        ]);

        // Check if room schedule with the same room, date, and time exists
        $existingSchedule = RoomSchedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->where('start_time', $request->start_time)
            ->where('end_time', $request->end_time)
            ->where('id', '!=', $roomSchedule->id) 
            ->first();

        if ($existingSchedule) {
            return redirect()->back()->withInput()->with('error', 'Failed to update room schedule. The room is already booked for the selected date and time.');
        }

        $roomSchedule->update($request->all());

        return redirect()->route('admin.room-schedules.index')
            ->with('success', 'Room schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomSchedule $roomSchedule)
    {
        $roomSchedule->delete();
        return redirect()->route('admin.room-schedules.index')
            ->with('success', 'Room schedule deleted successfully.');
    }
}
