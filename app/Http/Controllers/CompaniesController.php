<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Company index page
     *
     * @return void
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Auth::user()->companies()->orderBy('company_name')->get()
        ]);
    }

    /**
     * Display the create form
     *
     * @return void
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Create and Save the Company
     *
     * @return void
     */
    public function store()
    {
        request()->validate([
            'company_name' => ['required', 'max:150']
        ]);

        $company = Auth::user()->companies()->create(request([
            'company_name', 
            'street_address', 
            'secondary_address', 
            'city', 
            'state', 
            'country',
            'zipcode', 
            'contact_name', 
            'contact_email'
        ]));

        return redirect("/companies/{$company->id}");
    }

    public function edit($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    public function update($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        request()->validate([
            'company_name' => ['required', 'max:150']
        ]);

        $company->update(request([
            'company_name', 
            'street_address', 
            'secondary_address', 
            'city', 
            'state', 
            'country',
            'zipcode', 
            'contact_name', 
            'contact_email'
        ]));

        return redirect("/companies/{$company->id}");
    }

    public function destroy($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        $company->delete();

        return redirect("/companies");
    }
}
