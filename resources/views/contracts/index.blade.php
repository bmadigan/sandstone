@extends('layouts.app')

@section('content')

    <section class="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="vab">
                    <span class="mr2">Contract Listings</span>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-md">
                    x Create A New Contract
                </a>
            </div>

            <div class="panel-content">
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
    </section>

@endsection