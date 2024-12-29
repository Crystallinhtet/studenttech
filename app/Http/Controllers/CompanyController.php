<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all(); 
        return view("admin.companies", compact("companies"));
    }

    public function create(Request $request)
    {
        $company = new Company();
        $company->name = $request->input("name");
        $company->url = $request->input("url");
        $company->save();

        return redirect()->back()->with("success", "");
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->url = $request->input("url");
        $company->save();

        return redirect()->back()->with("success", "");
    }

    public function delete($id)
    {
        $feetype = Company::findOrFail($id);
        $feetype->delete();

        return redirect()->back()->with("success", "");
    }
}
