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

            <div class="row">
                <table class="table" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="pl2">Contract #</th>
                        <th>On</th>
                        <th>Tags</th>
                        <th>Runtime</th>
                        <th>Failed At</th>
                        <th>Retry</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contracts as $contract)

                        <tr>
                            <td class="ph2">
                                <a href="fw7">{{ $contract->contract_number }}</a>
                            </td>
                            <td>Que #</td>
                            <td>Somehting</td>
                            <td>adlkjfad</td>
                            <td>akjdshfasf</td>
                            <td>
                                icon
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
