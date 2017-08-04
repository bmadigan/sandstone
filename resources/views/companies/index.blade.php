@extends('layouts.app')

@section('content')

    <div class="panel">
        <div class="panel-heading">
            <h3>Company Listings</h3>
        </div>
        <div class="panel-default">
            @foreach($companies as $company)
                <div>
                    Company: {{ $company->company_name }}
                </div>
            @endforeach
        </div>
    </div>

@endsection