@extends('layouts.app')

@section('content')

    <section class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="vab">
                    <span class="mr2">Product Listings</span>
                </div>
                <button href="{{ route('products.create') }}" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-square mr1" aria-hidden="true"></i> Create A New Product
                </button>
            </div>

            <div class="panel-content">
                <table class="table mt3" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="pl2">Product</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="ph2">
                                <a href="fw7">{{ $product->product_name }}</a>
                                <p class="lh2 helper-text">Last Updated: <strong>{{ $product->updated_at }}</strong></p>
                            </td>
                            <td>{{ $product->displayPrice() }}</td>
                            <td>
                                <a href=""><i class="fa fa-pencil-square mr1" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection