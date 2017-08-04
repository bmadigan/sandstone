@extends('layouts.app')

@section('content')

    <section class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="vab">
                    <span class="mr2">Product Listings</span>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-md">
                    x Create A New Product
                </a>
            </div>

            <div class="panel-content">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="pl2">Product</th>
                        <th>Price</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="ph2">
                                <a href="fw7">{{ $product->product_name }}</a>
                            </td>
                            <td>{{ $product->displayPrice() }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                icon
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection