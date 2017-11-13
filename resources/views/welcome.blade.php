@extends('layouts.public')

@section('content')

    <div class="bg-soft p-xs-y-5">
        <div class="container m-xs-b-4">
            <div class="m-xs-b-6">

                <div class="row">
                    <div class="card">
                        <div class="card-section">
                            <h2 class="m-xs-b-4">Sandstone by <em>Brad Madigan (@bmadigan)</em></h2>
                            <blockquote>> Many of the ancient pillars were built using Sandstone as a base material</blockquote>
                            <p class="text-welcome">This is a sample boilerplate Laravel 5.5 application that creates several modules that you can
                            easily integrate into a new project. The application comes with an <a href="{{ url('/dashboard') }}">Admin Backend</a> that you can log into using 'test@example.com' with a password of 'secret123'</p>
                            <p class="text-welcome">Below is a Sample <em>Ecommerce</em> Shopping Cart using a VueJS custom Component</p>
                        </div>
                    </div>
                </div><!--/row-->

                {{-- Sample Products --}}
                <div class="row m-xs-t-4">
                    <div class="card">
                        <div class="card-section">
                            <h2 class="m-xs-b-2">
                                10 Random Products (VueJS Component)
                                <a href="{{ url('/cart') }}" class="view-cart">View Cart</a>
                            </h2>

                            <product-listings></product-listings>
                        </div>
                    </div>
                </div><!--/row-->

            </div>
        </div>
    </div>

@endsection
