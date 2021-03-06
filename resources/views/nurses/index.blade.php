@extends('layouts.app', ['activePage' => 'nurses', 'title' => 'Medicine Dispenser System', 'navName' => 'Nurses', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Nurses</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#create" type="button" class="btn btn-success btn-wd">New Record</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('nurses.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('nurses.create')
@include('nurses.update')
@include('nurses.view')
@include('nurses.fingerprint')
@include('nurses.delete')
@endsection

@push('scripts')

@endpush