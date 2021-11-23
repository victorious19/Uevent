<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function create(Request $request) {
        $request->validate([
            'type' => 'required|in:user_event,company_event',
            'poster' => 'image',
            'tickets' => 'required|integer|min:1',
            'date' => 'required|string|date',
            'price' => 'required|integer|min:0',
            'format' => 'required|in:conference,lecture,workshop,fest',
            'theme_id' => 'required|exists:themes,id',
            'description' => 'required|string',
            'location' => 'required',
            'publishing_date' => 'date'
        ]);
        $user = auth()->user();
        $request = $this->owner_update($request, $user);

        return Event::create($request->all());
    }
    function get_all() {
        return Event::all();
    }
    function change(Request $request, $event_id) {
        $request->validate([
            'type' => 'in:user_event,company_event',
            'poster' => 'image',
            'tickets' => 'integer|min:1',
            'date' => 'string|date',
            'price' => 'integer|min:0',
            'format' => 'in:conference,lecture,workshop,fest',
            'theme_id' => 'exists:themes,id',
            'description' => 'string',
            'publishing_date' => 'date'
        ]);
        $event = Event::find($event_id);
        if(!$event) return response(['status' => 'error', 'message' => 'Event not found'], 404);

        $user = auth()->user();

        if ($request->get('type')) $request = $this->owner_update($request, $user);
        else {
            unset($request["user_id"]);
            unset($request["company_id"]);
        }

        $event->update($request->all());
        return $event;
    }
    function delete($event_id) {
        $event = Event::find($event_id);
        if(!$event) return response(['status' => 'error', 'message' => 'Event not found'], 404);
        return $event->delete();
    }
    function owner_update($request, $user) {
        if ($request->get('type') == 'user_event')
            $request["user_id"] = $user->id;
        else
            $request["company_id"] = $user->company()->id;
        return $request;
    }
}
