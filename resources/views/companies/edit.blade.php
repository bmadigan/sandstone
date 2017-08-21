@extends('layouts.app')

@section('content')
<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Update Company</h1>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">Company Index</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">

            <div class="row">
                I am an Edit form
            </div>
        </div>
    </div>
</div>

@endsection
