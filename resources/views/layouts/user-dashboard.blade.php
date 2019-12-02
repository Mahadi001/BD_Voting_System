@extends('layouts.app')
@section('content')
    </div>
        <div class="container">
            <div class="d-flex" id="wrapper">
                <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a href="/correction/{{$corrections->id}}/view" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href="/vote/{{$corrections->id}}" class="list-group-item list-group-item-action bg-light">Vote</a>
                    <a href="{{ route('user.apply')}}" class="list-group-item list-group-item-action bg-light">Apply for Candidate</a>
                    <a href="/correction/{{$corrections->id}}/edit" class="list-group-item list-group-item-action bg-light">Apply for Correction</a>
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

