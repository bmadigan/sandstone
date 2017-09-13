<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Customer extends Model
{
    use Billable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public function createNewOrder(Request $request)
    {
        $cartItems = Cart::content();

        // Create the order
        $order = Order::create([
            'customer_id'       => $this->id,
            'order_number'      => Order::generateOrderNumber(),
            'customer_email'    => $request->email,
            'payment_token'     => $request->payment_token,
            'client_ip'         => $request->client_ip,
            'cc_last_4'         => $request->cc_last_4,
            'cc_brand'          => $request->cc_brand,
            'total_paid'        => Cart::total()
        ]);

        foreach($cart as $cartItems) {
            // Add Order Item record

        }

    }
}
