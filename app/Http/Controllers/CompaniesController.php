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
            'companies' => Auth::user()->companies()->orderBy('company_name')->paginate(10)
        ]);
    }

    /**
     * Company show page
     *
     * @return void
     */
    public function show($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        return view('companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Display the create form
     *
     * @return void
     */
    public function create()
    {
        $company = new Company;

        return view('companies.create', [
            'company' => $company,
        ]);
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

        return redirect("/companies/{$company->id}")
                ->with('flash', 'The company has been created!')
                ->with('css', 'alert-success');
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


        return redirect($company->path())
                ->with('flash', 'The company has been updated!')
                ->with('css', 'alert-success');
    }

    public function destroy($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        $company->delete();

        if(request()->wantsJson()) {
            return response([], 204);
        }

        return redirect('/companies')
                ->with('flash', 'The company has been removed!')
                ->with('css', 'alert-success');
    }
}
