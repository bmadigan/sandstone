@extends('layouts.app')

@section('content')
<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Create A New Company</h1>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">Company Index</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        {!! Form::open(['route' => 'companies.store']) !!}

            <div class="card">

                @include('companies._form')

                <div class="card-section">
                    <div class="container text-right">
                        <button type="submit" class="btn btn-primary">Save New Company</button>
                    </div>
                </div>

            </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection
