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

            <div class="row">
                <div class="card">
                    <div class="card-section">

                        <h4>Here is a sample custom Blade Directive</h4>

                        @public
                            <p>I can be seen by anyone</p>
                        @else
                            <p>I can only be seen by Authenticated Users</p>
                        @endpublic
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
