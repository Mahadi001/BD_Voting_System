@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Approve Candidate</a>
            <a href="#" class="list-group-item list-group-item-action bg-light"></a>

        </div>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                @yield('subadmin-content')
            </div>
        </div>
    </div>
 </div>
 @endsection