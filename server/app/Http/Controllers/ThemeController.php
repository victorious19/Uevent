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
        return Theme::create(['title' => $request->title]);
    }
    function delete($theme_id) {
        $theme = Theme::find($theme_id);
        if(!$theme) return response(['status' => 'error', 'message' => 'Theme not found'], 404);

        return $theme->delete();
    }
    function get_all() {
        return Theme::all();
    }
}
