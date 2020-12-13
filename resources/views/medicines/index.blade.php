@extends('layouts.app', ['activePage' => 'medicines', 'title' => 'Medicine Dispenser System', 'navName' => 'Medicines', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Medicines</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#create" type="button" class="btn btn-success btn-wd">New Record</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('medicines.table')
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@include('medicines.create')
@include('medicines.update')
@include('medicines.view')
@include('medicines.delete')
@endsection

@push('scripts')

@endpush
