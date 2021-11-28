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
    function change(Request $request, $company_id) {
        $company = Company::find($company_id);

        if(!$company) return response(['status' => 'error', 'message' => 'Company not found'], 404);
        if($request->get('user_id')) unset($request["user_id"]);
        $company->update($request->all());

        return $company;
    }
    function delete($company_id) {
        $company = Company::find($company_id);

        if(!$company) return response(['status' => 'error', 'message' => 'Company not found'], 404);
        return $company->delete();
    }
    function get($company_id) {
        $company = Company::find($company_id);

        if(!$company) return response(['status' => 'error', 'message' => 'Company not found'], 404);
        return $company;
    }
}
