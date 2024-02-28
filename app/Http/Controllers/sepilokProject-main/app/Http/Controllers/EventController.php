<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function viewEvents() {
    // Get today's date
    $today = Carbon::now()->toDateString();

    // Fetch today's events
    $todayEvents = Event::whereDate('start', $today)->get();

    // Fetch events for later dates
    $futureEvents = Event::where('start', '>', $today)
        ->orderBy('start', 'asc') // Order by start date in ascending order
        ->get();

    // Concatenate today's events and future events
    $events = $todayEvents->concat($futureEvents);

    return view('full_calendar', compact('events'));

    }

    public function index (Request $request) {
        if ($request->ajax()) {
            $event = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($event);
        }

        return view('full_calendar');
    }

    public function storeEvent(Request $request) {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
            
            case 'delete':
                $event = Event::find($request->id)->delete();
                return response()->json($event);

                default:
                break;
        }
    }
}
