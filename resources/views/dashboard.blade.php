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
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Nurses registered.</div>
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
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Nurses registered.</div>
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
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Nurses registered.</div>
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
                            <i class="fa fa-info-circle"></i><div class="stats" style="color: #000;">Number of Nurses registered.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Medicine Dispensers</h4>
                            <p class="card-category">show medicine dispenser information.</p>
                        </div>
                        <div class="card-body ">
                            @foreach($dispensers as $dispenser)
                                @if($dispenser->maintenance == 1)
                                <div class="card mb-3" style="background-color: #ebebeb;">                     
                                    <div class="card-body">
                                    <h5 class="card-title">ID: {{$dispenser->id}} - {{$dispenser->name}}</h5>
                                        <div class="row mt-2">
                                            <div class="col-md-9">
                                                <div class="progress mt-2">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="{{ $dispenser->capacitiy }}" aria-valuemin="0" aria-valuemax="{{ $dispenser->ceiling }}"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                @csrf
                                                <button type="button" class="btn text-white bg-success"><i class="fa fa-cog"></i></button>
                                                <button type="button" id="{{ $dispenser->id }}" class="btn text-white bg-primary relay"><i class="fa fa-bell"></i></button>                                            
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
    <script type="text/javascript">
        $('.relay').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type:"post",
                url: '/dispensers/relay',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": this.id
                },
                success:function(res) {
                    console.log(res);
                },
                error:function() {
                }
            });
        });
    </script>
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