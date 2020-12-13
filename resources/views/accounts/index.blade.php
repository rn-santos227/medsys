@extends('layouts.app', ['activePage' => 'users', 'title' => 'Medicine Dispenser System', 'navName' => 'Accounts', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Accounts</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#create" type="button" class="btn btn-success btn-wd">New User</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('accounts.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('accounts.create')
@include('accounts.view')\
@include('accounts.delete')
@endsection

@push('scripts')

@endpush