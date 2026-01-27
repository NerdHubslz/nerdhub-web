<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('start_time', '>=', now())
            ->orderBy('start_time')
            ->get();

        $pastEvents = Event::where('start_time', '<', now())
            ->orderBy('start_time', 'desc')
            ->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
