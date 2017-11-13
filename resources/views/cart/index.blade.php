@extends('layouts.public')

@section('content')

    <div class="bg-soft p-xs-y-5">
        <div class="container m-xs-b-4">
            <div class="m-xs-b-6">

                {{-- Sample Products --}}
                <div class="row m-xs-t-4">
                    <div class="card">
                        <div class="card-section">
                            <h2 class="m-xs-b-2">
                                Your Cart (Sample VueJS Cart)
                                <a href="{{ url('/') }}" class="view-cart">Continue Shopping</a>
                            </h2>

                            <shopping-cart></shopping-cart>
                        </div>
                    </div>
                </div><!--/row-->

            </div>
        </div>
    </div>

@endsection
