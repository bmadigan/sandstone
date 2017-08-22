@extends('layouts.app')

@section('content')

<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Product Listings</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add A New Product</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">

            <div class="row">
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
                                <a href="{{ route('products.show', $product) }}" class="fw7">{{ $product->product_name }}</a>
                                <p class="lh2 helper-text">Last Updated: <strong>{{ displayShortDate($product->updated_at) }}</strong></p>
                            </td>
                            <td>{{ formatAsCurrency($product->price) }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}"><i class="fa fa-pencil-square mr1" aria-hidden="true"></i></a>

                                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE', 'class' => 'inline']) !!}
                                    <button type="submit" class="btn btn-link">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
