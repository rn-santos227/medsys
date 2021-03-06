@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Medicine Dispenser System', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3" style="background-color: #83eaff;">                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3 class="card-title"><i class="nc-icon nc-single-02"></i></h3>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="card-title">Nurses</h3>
                                </div>
                                <div class="col-md-1">
                                <h3 class="card-title">{{ $nurse_count }}</h3>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer pt-2">
                            <hr>
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Nurses registered.</div>
                        </div>
                    </div>
                    <div class="card mb-3" style="background-color: #83eaff;">                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3 class="card-title"><i class="nc-icon nc-single-02"></i></h3>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="card-title">Patients</h3>
                                </div>
                                <div class="col-md-1">
                                    <h3 class="card-title">{{ $patient_count }}</h3>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer pt-0">
                            <hr>
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Patients registered.</div>
                        </div>
                    </div>
                    <div class="card mb-3" style="background-color: #83eaff;">                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3 class="card-title"><i class="nc-icon nc-ambulance"></i></h3>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="card-title">Medicines</h3>
                                </div>
                                <div class="col-md-1">
                                    <h3 class="card-title">{{ $medicine_count }}</h3>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer pt-0">
                            <hr>
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Medecines registered.</div>
                        </div>
                    </div>
                    <div class="card mb-3" style="background-color: #83ff98;">                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3 class="card-title"><i class="nc-icon nc-watch-time"></i></h3>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="card-title">Schedules</h3>
                                </div>
                                <div class="col-md-1">
                                    <h3 class="card-title">{{ $schedule_count }}</h3>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer pt-0">
                            <hr>
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Schedules.</div>
                        </div>
                    </div>
                    <div class="card mb-3" style="background-color: #83ff98;">                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3 class="card-title"><i class="nc-icon nc-paper-2"></i></h3>
                                </div>
                                <div class="col-md-9">
                                    <h3 class="card-title">Assignments</h3>
                                </div>
                                <div class="col-md-1">
                                    <h3 class="card-title">{{ $assignment_count }}</h3>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer pt-0">
                            <hr>
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Assignments.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">Medicine Storages</h4>
                                    <p class="card-category">show medicine storage information.</p>
                                </div>
                                <div class="col-md-4">
                                    <form action="/dispensers/door" method="GET">
                                        @csrf
                                        <button type="submit" class="door btn btn-warning ml-4"><i class="fa fa-unlock"></i> Unlock Dispenser Door</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            @foreach($dispensers as $dispenser)
                                @if($dispenser->maintenance == 1)
                                <div class="card mb-3" style="background-color: #ebebeb;">                     
                                    <div class="card-body">
                                    <h5 class="card-title">ID: {{$dispenser->id}} - {{$dispenser->name}}</h5>
                                        <div class="row mt-2">
                                            <div class="col-md-10">
                                                <div class="progress mt-2">
                                                    <div class="progress-bar {{ $dispenser->quantity > $dispenser->critical ? 'bg-success' : 'bg-danger' }}" role="progressbar" style="width: {{ ($dispenser->quantity / $dispenser->ceiling) * 100 }}%" aria-valuenow="{{ $dispenser->quantity }}" aria-valuemin="0" aria-valuemax="{{ $dispenser->ceiling }}"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                @csrf
                                                <button data-toggle="modal" data-target="#manual_{{ $dispenser->id}}" class="btn text-white bg-primary"><i class="fa fa-bell"></i></button>                                            
                                            </div>
                                        </div>           
                                    </div>
                                    <div class="card-footer pt-0">
                                        <hr>
                                        <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">{{$dispenser->notes}}</div>
                                    </div>
                                </div> 
                                @endif
                            @endforeach                        
                        </div>
                        <div class="card-footer ">

                    </div>
                </div>
            </div>
        </div>
    </div>

@include('manual')
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
            demo.showNotification();
        });
    </script>
@endpush