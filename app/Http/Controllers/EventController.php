<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Style;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event(){

        $events = Event::orderBy('venue')->get();

        return view('event.event',['events' => $events]);
    }

    public function create()
    {
        $style = Style::list();
        return view('event.create', ['style' => $style]);
    }

    public function store(Request $request){
            $request->validate([
                'style_id' => 'required|numeric',
                'event_name' => 'required',
                'date' => 'required|date',
                'venue' => 'required',
                'description' => 'required'
            ]);

            Event::create([
                'style_id' => $request->style_id,
                'event_name' => $request->event_name,
                'date' => $request->date,
                'venue' => $request->venue,
                'description' => $request->description
            ]);

            return redirect('/event')->with('message', 'A new event has been added');
        }

        public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Event $event, Request $request)
    {
        $request->validate([
                'style_id' => 'required|numeric',
                'event_name' => 'required',
                'date' => 'required|date',
                'venue' => 'required',
                'description' => 'required'
        ]);

        $event -> update($request->all());
        return redirect('/event')->with('message', "$event->event_name has been updated.");
    }
    public function delete(Event $event)
    {
        $event->delete();

        return redirect('/event')->with('message', "$event->name has been deleted successfully");
    }
}
