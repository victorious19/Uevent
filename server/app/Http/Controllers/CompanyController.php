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
        $company = Company::create($request->all());
        auth()->user()["company_id"] = $company->id;

        return $company;
    }
    function change(Request $request, $company_id) {
        $company = Company::find($company_id);

        if(!$company) return response(['status' => 'error', 'message' => 'Company not found'], 404);
        if($request->get('user_id')) unset($request["user_i"]);
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
