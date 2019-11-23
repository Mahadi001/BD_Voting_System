@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex" id="wrapper">
            <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Create Vote</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Candidate Approval</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Correction Application</a>
            </div>
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
@endsection