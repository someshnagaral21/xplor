@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-6">
                <h3 class="fst-italic">Customers</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <table class="table table-sm table-hover table-striped" id="customers">
                    <thead>
                    <tr>
                        <th scope="col" style="text-align: left;">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="get-customers-data" value="{{ route('customers.get-customers-data') }}">
    
@endsection
@section('footer_scripts')
    @vite('resources/js/customers/index.js')
@endsection
