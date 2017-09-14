<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function show($orderNumber)
    {
        $order = Order::findByOrderNumber($orderNumber);

        return view('invoice.show', [
            'order' => $order,
        ]);
    }
}
