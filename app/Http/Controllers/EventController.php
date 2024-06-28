<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function listEvent(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Event::where('start_date', '>=', $start)
            ->where('end_date', '<=', $end)->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'start' => $item->start_date,
                    'end' => date('Y-m-d', strtotime($item->end_date . '+1 days')),
                    'category' => $item->category,
                    'className' => ['bg-' . $item->category]
                ];
            });

        return response()->json($events);
    }

    
}
