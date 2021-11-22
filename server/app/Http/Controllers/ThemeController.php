<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    function create(Request $request) {
        $request->validate([
            'title' => 'required'
        ]);
        return Theme::create($request->title);
    }
}
