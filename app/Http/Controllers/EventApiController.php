<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    public function index() {
        $events = Event::orderBy('id')->get();

        return response()->json($events);
    }

    public function view(Event $event)
    {
        $event->load('style'); // Fix the variable name to $event

        return response()->json($event);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'event_name' => 'required',
            'date' => 'required|date',
            'venue' => 'nullable|string',
            'description' => 'nullable|string',
            'style_id' => 'nullable|exists:styles,id', // Assuming 'styles' is the correct table name
        ]);

        $event = Event::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Event created successfully',
            'event_id' => $event->id,
        ]);
    }

    public function update(Request $request, Event $event) {
        $fields = $request->validate([
            'event_name' => 'required',
            'date' => 'required|date',
            'venue' => 'nullable|string',
            'description' => 'nullable|string',
            'style_id' => 'nullable|exists:styles,id', // Assuming 'styles' is the correct table name
        ]);
        // return response()->json($fields);
        $event->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Event with ID# ' . $event->id . ' has been updated.'
        ]);
    }

    public function destroy(Event $event)
{
    $event->delete();

    return response()->json([
        'status' => 'OK',
        'message' => 'Event with ID# ' . $event->id . ' has been deleted.'
    ]);
}

}
