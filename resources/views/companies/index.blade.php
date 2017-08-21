@extends('layouts.app')

@section('content')
<div class="bg-light p-xs-y-4 border-b">
    <div class="container">
        <div class="flex-spaced flex-y-center">
            <h1 class="text-lg">Company Index</h1>
            <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
        </div>
    </div>
</div>

<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">

            <div class="alert alert-notify ">
                * This table is a standard Eloquent pagination example with a Blade directive
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-section">

                        <table class="table" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Company</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Contact</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>
                                            <a href="{{ $company->path() }}">
                                                {{ $company->company_name }}
                                            </a>
                                        </td>
                                        <td>
                                            {!! $company->displayStreetAddress() !!}
                                        </td>
                                        <td>{{ $company->city }}</td>
                                        <td>{!! $company->displayContact() !!}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company) }}">
                                                <i class="fa fa-pencil-square m-xs-2" aria-hidden="true"></i>
                                            </a>
                                            <a href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $companies->links() }}

                    </div><!--/card-section-->
                </div><!--/card-->

            </div><!--/row-->
        </div><!--/m-xs-->
    </div>
</div>

@endsection
