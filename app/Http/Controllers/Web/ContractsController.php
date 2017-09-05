<?php

namespace App\Http\Controllers\Web;

use Auth;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractsController extends Controller
{
    /**
     * contract index page
     *
     * @return void
     */
    public function index()
    {
        return view('contracts.index', [
            'contracts' => Auth::user()->contracts()->orderBy('contract_number')->get()
        ]);
    }

    /**
     * Display the create form
     *
     * @return void
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Create and Save the Contract
     *
     * @return void
     */
    public function store()
    {
        request()->validate([
            'contract_name' => ['required', 'max:150']
        ]);

        $contract = Auth::user()->contracts()->create(request([
            'buyer_id',
            'contract_name',
            'contract_number',
            'released_date',
            'released_weight'
        ]));

        return redirect("/contracts/{$contract->id}");
    }

    public function edit($id)
    {
        $contract = Auth::user()->contracts()->findOrFail($id);

        return view('contracts.edit', [
            'contract' => $contract,
        ]);
    }

    public function update($id)
    {
        $contract = Auth::user()->contracts()->findOrFail($id);

        request()->validate([
            'contract_name' => ['required', 'max:150']
        ]);

        $contract->update(request([
            'buyer_id',
            'contract_name',
            'released_date',
            'released_weight'
        ]));

        return redirect("/contracts/{$contract->id}");
    }

    public function destroy($id)
    {
        $contract = Auth::user()->contracts()->findOrFail($id);

        $contract->delete();

        return redirect("/contracts");
    }
}
