@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="d-flex" id="wrapper">
                <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a href="{{ route('user') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href="{{ route('vote.list') }}" class="list-group-item list-group-item-action bg-light">Vote</a>
                    <a href="{{ route('candidate.apply')}}" class="list-group-item list-group-item-action bg-light">Apply for Candidate</a>
                    <a href="{{ route('correction.view') }}" class="list-group-item list-group-item-action bg-light">Apply for Correction</a>
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

