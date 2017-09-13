<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'owner_id'          => $this->user_id,
            'owner'             => $this->user->name,
            'name'              => $this->product_name,
            'description'       => $this->product_description,
            'image'             => $this->product_image,
            'price_amount'      => $this->price,
            'price_display'     => $this->displayPrice(),
            'created_at'        => $this->created_at
        ];
    }
}
