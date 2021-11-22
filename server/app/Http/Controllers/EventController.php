<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
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
        if ($request->get('type') == 'user_event')
            $request["user_id"] = $user->id;
        else
            $request["company_id"] = $user->company()->id;
        $request["theme_id"] = $user->theme()->id;

        return User::create($request->all());

    }
    function get_all() {
        return Event::all();
    }
}
