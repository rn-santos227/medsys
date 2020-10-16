<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a  class="simple-text">
                Medicine Dispenser System
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'schedule') active @endif">
                <a class="nav-link" href="{{route('page.index', 'table')}}">
                    <i class="nc-icon nc-watch-time"></i>
                    <p>{{ __("Schedule") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'dispenser') active @endif">
                <a class="nav-link" href="{{route('page.index', 'typography')}}">
                    <i class="nc-icon nc-settings-gear-64"></i>
                    <p>{{ __("Dispensers") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'records') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Records") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'assignments') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Assignments") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'nurse') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __("Nurses") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'patient') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __("Patients") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'medicine') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-ambulance"></i>
                    <p>{{ __("Medicines") }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
