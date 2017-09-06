<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ContractResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'contract_number'   => $this->contract_number,
            'contract_name'     => $this->contract_name,
            'released_date'     => $this->released_date,
            'released_weight'   => $this->released_weight,
            'buyer'             => $this->buyer,
            'owner'             => $this->user
        ];
    }
}
