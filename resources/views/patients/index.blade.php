@extends('layouts.app', ['activePage' => 'patients', 'title' => 'Medicine Dispenser System', 'navName' => 'Patients', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Patients</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#fingerprint" type="button" class="btn btn-success btn-wd">New Record</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('patients.table')
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@include('patients.create')
@endsection

@push('scripts')

@endpush