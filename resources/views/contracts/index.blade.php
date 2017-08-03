@extends('layouts.app')

@section('content')

    <h3>Contract Listings</h3>

    @foreach($contracts as $contract)
        <div>
            contract #: {{ $contract->id }}
        </div>
    @endforeach

@endsection