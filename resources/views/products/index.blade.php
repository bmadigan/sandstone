@extends('layouts.app')

@section('content')

    <h3>Product Listings</h3>

    @foreach($products as $product)
        <div>
            product: {{ $product->product_name }}
        </div>
    @endforeach

@endsection