@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="{{ route('political_party.dashboard') }}" class="list-group-item list-group-item-action bg-light">Approve Candidate</a>
        </div>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('political_party-content')
            </div>
        </div>
    </div>
 </div>
 @endsection