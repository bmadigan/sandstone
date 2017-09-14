@extends('layouts.public')

@section('content')

    <div class="bg-soft p-xs-y-5">
        <div class="container m-xs-b-4">
            <div class="m-xs-b-6">

                {{-- Sample Products --}}
                <div class="row m-xs-t-4">
                    <div class="card">
                        <div class="card-section">
                            <h2 class="m-xs-b-2 border-b">
                                Invoice #{{ $order->order_number }} &nbsp;
                                <a href="{{ url('/') }}" class="view-cart">Back To Store</a>
                            </h2>
                            <small>{{ $order->customer_email }}</small><br>
                            <small>Invoice Date: {{ $order->created_at->toFormattedDateString() }}</small><br>
                            <small>Credit Card: {{ $order->cc_brand }} {{ $order->cc_last_4 }}</small>
                        </div>
                    </div>

                    <div class="card m-xs-t-4">
                        <div class="card-section">
                            <h2 class="m-xs-b-2 border-b">
                                Order Details
                            </h2>

                            <table>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td width="80%">{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }} @ {{ formatAsCurrency($item->product_price) }} each</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td width="80%" class="border-t"><strong>Total Due</strong></td>
                                    <td class="border-t"><strong>{{ formatAsCurrency($order->total_paid) }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div><!--/row-->

            </div>
        </div>
    </div>

@endsection
