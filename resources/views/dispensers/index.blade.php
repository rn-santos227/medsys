@extends('layouts.app', ['activePage' => 'dispensers', 'title' => 'Medicine Dispenser System', 'navName' => 'Dispensers', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">List of Dispensers</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('dispensers.table')
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>

@include('dispensers.update')
@include('dispensers.maintenance')
@endsection

@push('scripts')

@endpush