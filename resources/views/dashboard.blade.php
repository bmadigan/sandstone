@extends('layouts.app')

@section('content')

<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Dashboard</h1>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">
            <div class="card">
                <div class="row">
                    <div class="col col-md-4 border-md-r">
                        <div class="card-section p-md-r-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Customers</h3>
                            <div class="text-jumbo wt-bold">
                                {{ Auth::user()->totalCustomers() }}
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 border-md-r">
                        <div class="card-section p-md-x-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Products Sold</h3>
                            <div class="text-jumbo wt-bold">
                                {{ Auth::user()->totalProductsSold() }}
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card-section p-md-l-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Revenue</h3>
                            <div class="text-jumbo wt-bold">
                                {{ Auth::user()->getTotalRevenue() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="m-xs-b-2 text-lg">Recent Orders</h2>
            <div class="card">
                <div class="card-section">

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Email</th>
                                <th class="text-left">Order Num</th>
                                <th class="text-left">Amount</th>
                                <th class="text-left">Card</th>
                                <th class="text-left">Purchased</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->getRecentOrders() as $order)
                                <tr>
                                    <td>{{ $order->customer_email }}</td>
                                    <td>#{{ $order->order_number }}</td>
                                    <td>{{ formatAsCurrency($order->total_paid) }}</td>
                                    <td><span class="text-dark-soft">****</span> {{ $order->cc_last_4 }} <small>({{ $order->cc_brand }})</small></td>
                                    <td class="text-dark-soft">{{ $order->created_at->toFormattedDateString() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
