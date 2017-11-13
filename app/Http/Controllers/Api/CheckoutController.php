<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $customer = Customer::firstOrCreate([
            'email' => $request->email
        ]);

        $order = $customer->createNewOrder($request);

        event(new OrderCompleted($order));

        // destroy cart
        Cart::destroy();

        return response()->json(['orderId' => $order->order_number], 200);
    }

}
