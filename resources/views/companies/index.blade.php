@extends('layouts.app')

@section('content')

    <h3>Company Listings</h3>

    @foreach($companies as $company)
        <div>
            Company: {{ $company->company_name }}
        </div>
    @endforeach

@endsection