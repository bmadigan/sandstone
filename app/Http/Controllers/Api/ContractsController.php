<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContractResource;

class ContractsController extends Controller
{
    public function index(Request $request)
    {
        if($request->searchQuery) {
            //
        }

        $contracts = Auth::user()->contracts()->latest()->paginate(20);

        return ContractResource::collection($contracts);
    }

    public function show($id)
    {
        $contract = Auth::user()->contracts()->findOrFail($id);

        return new ContractResource($contract);
    }
}
