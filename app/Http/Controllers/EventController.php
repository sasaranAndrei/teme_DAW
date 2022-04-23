<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use App\Models\RealEstate;

class EventController extends Controller
{
    public function index(Request $request)
    {
      // dd($request->ajax); // nu stiu de ce nu merge aici

        if($request->ajax()) {  
            $data = CalendarEvent::whereDate('event_start', '>=', $request->start)
                ->whereDate('event_end',   '<=', $request->end)
                ->get(['id', 'user_id', 'real_estate_id', 'event_start', 'event_end']);
            return response()->json($data);
        }
        return view('calendar');
    }
 

    public function manageEvents(Request $request)
    {
        switch ($request->type) {
           case 'create':
              $calendarEvent = CalendarEvent::create([
                'user_id' => auth()->user()->id,
                'real_estate_id' => $request->real_estate_id,
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
              ]);
 
              return response()->json($calendarEvent);
             break;
  
           case 'edit':
              $calendarEvent = CalendarEvent::find($request->id)->update([
                'user_id' => $request->user_id,
                'real_estate_id' => $request->real_estate_id,
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
              ]);
 
              return response()->json($calendarEvent);
             break;
  
           case 'delete':
              $calendarEvent = CalendarEvent::find($request->id)->delete();
  
              return response()->json($calendarEvent);
             break;
             
           default:
             break;
        }
    }

    public function create(Request $request)
    {
        $real_estate = RealEstate::find($request->get('real_estate_id'));

        return view('calendar_events.create', compact('real_estate'));
    }

    public function store(Request $request)
    {
        CalendarEvent::create($request->all());

        return redirect()->route('real_estates.index')
                        ->with('success','Booking created successfully.');
    }
}
