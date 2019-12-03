@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="{{ route('candidate.request.list') }}" class="list-group-item list-group-item-action bg-light">Requested Candidate</a>
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