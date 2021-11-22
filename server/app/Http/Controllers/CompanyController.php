<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'location' => 'required'
        ]);
        $request["user_id"] = auth()->user()->id;

        return Company::create($request->all());
    }
}
