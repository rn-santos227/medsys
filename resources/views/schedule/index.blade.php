@extends('layouts.app', ['activePage' => 'schedule', 'title' => 'Medicine Dispenser System', 'navName' => 'Schedule', 'activeButton' => 'laravel'])
   
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Schedules</h4>
                            </div>
                            <div class="col-md-2 pull-right">
                                <button data-toggle="modal" data-target="#create" type="button" class="btn btn-success btn-wd">New Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('schedule.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('schedule.create')
@include('schedule.view')
@include('schedule.update')
@include('schedule.delete')
@endsection

@push('scripts')

@endpush