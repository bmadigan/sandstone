<?php

namespace App\Http\Controllers\Api;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function recentOrders()
    {
         return Auth::user()->getRecentOrders();
    }

    public function totalProductsSold()
    {
         return Auth::user()->totalProductsSold();
    }

    public function totalRevenue()
    {
        return Auth::user()->getTotalRevenue();
    }

    public function totalCustomers()
    {
        return Auth::user()->totalCustomers();
    }
}
