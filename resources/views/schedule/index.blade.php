@extends('layouts.app', ['activePage' => 'schedule', 'title' => 'Medicine Dispenser System', 'navName' => 'Schedule', 'activeButton' => 'laravel'])
   
@section('content')
    <div id='calendar'></div>
@endsection

@push('scripts')
    $(document).ready(function() {
        $('#calendar').fullCalendar({

        });
    });
@endpush