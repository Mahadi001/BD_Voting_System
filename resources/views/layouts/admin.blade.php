@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a data-toggle="collapse" href="#dropdown-lvl1" class="list-group-item list-group-item-action bg-light">Birth Certificate</a>
            <div id="dropdown-lvl1" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="list-group-item list-group-item-action bg-light">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('certificate.create') }}">Create</a></li>
                        <li><a href="{{ route('certificate.index') }}">Records</a></li>
                    </ul>
                </div>
            </div>

            <a data-toggle="collapse" href="#dropdown-election" class="list-group-item list-group-item-action bg-light">Election</a>
	        <div id="dropdown-election" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="list-group-item list-group-item-action bg-light">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('election.create') }}">Create</a></li>
                        <li><a href="{{ route('election.index') }}">Records</a></li>
                    </ul>
                </div>
            </div>

            <a href="{{ route('admin.candidate.request.list') }}" class="list-group-item list-group-item-action bg-light">Requested Candidate</a>
            <a href="{{ route('correction.index') }}" class="list-group-item list-group-item-action bg-light">Correction Application</a>
 
        </div>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('admin-content')
            </div>
        </div>
    </div>
 </div>
 @endsection
