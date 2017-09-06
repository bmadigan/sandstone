<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContractResource;

class ContractsController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();//Auth::user()->contracts()->orderBy('contract_id')->paginate(10);

        return ContractResource::collection($contracts);
    }

    public function show($id)
    {
        $contract = Auth::user()->contracts()->findOrFail($id);

        return new ContractResource($contract);
    }
}
