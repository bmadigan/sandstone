<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // Just get some random products
        $products = Product::inRandomOrder()->take(10)->get();

        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }

}
