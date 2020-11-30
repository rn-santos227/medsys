@extends('layouts.app', ['activePage' => 'assignments', 'title' => 'Medicine Dispenser System', 'navName' => 'Task Assignments', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Assignments</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#create" type="button" class="btn btn-success btn-wd">New Assignment</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('assignments.table')
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@include('assignments.create')
@include('assignments.update')
@endsection

@push('scripts')

@endpush