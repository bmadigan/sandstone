<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function show()
    {
        $cart = Cart::content();

        return response()->json(['cart' => $cart], 200);
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        Cart::add($product->id, $product->product_name, 1, $product->price);

        return response()->json(['message' => 'successful'], 201);
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['message' => 'removed'], 201);
    }

    public function destroy()
    {
        Cart::destroy();

        return response()->json(['message' => 'cancelled order'], 201);
    }
}
