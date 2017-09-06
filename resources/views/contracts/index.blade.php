@extends('layouts.app')

@section('content')

<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Contract Listing</h1>
            <a href="{{ route('contracts.create') }}" class="btn btn-primary">Add A New Contract</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">

            <div class="alert alert-notify ">
                * This table is VueJS Component
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-section">

                        <contract-list></contract-list>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
