@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex" id="wrapper">
            <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Vote</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Apply for Candidate</a>
                <a href="{{ route('certificate.index') }}" class="list-group-item list-group-item-action bg-light">Apply for Correction</a>
            </div>
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </div>
@endsection