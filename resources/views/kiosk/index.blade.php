@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Medicine Dispenser System', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header ">
                        <h4 class="card-title">{{ $temp }}</h4>
                    </div>
                    <div class="card-body ">
                        @foreach($dispensers as $dispenser)
                            @if($dispenser->maintenance == 1)
                            <div class="card mb-3" style="background-color: #ebebeb;">                     
                                <div class="card-body">
                                <h5 class="card-title">ID: {{$dispenser->id}} - {{$dispenser->name}}</h5>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <div class="progress mt-2">
                                                <div class="progress-bar {{ $dispenser->quantity > $dispenser->critical ? 'bg-success' : 'bg-danger' }}" role="progressbar" style="width: {{ ($dispenser->quantity / $dispenser->ceiling) * 100 }}%" aria-valuenow="{{ $dispenser->quantity }}" aria-valuemin="0" aria-valuemax="{{ $dispenser->ceiling }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            {{ $dispenser->quantity }} / {{ $dispenser->ceiling }}
                                        </div>
                                    </div>           
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
setTimeout(function(){
    window.location.reload(1);
}, 2000);
</script>
@endsection