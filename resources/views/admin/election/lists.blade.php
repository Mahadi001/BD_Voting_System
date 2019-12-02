@extends('layouts.dashboard')
@section('admin-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Election Type</th>
            <th scope="col">Date</th>
            <th scope="col">Starting Time</th>
            <th scope="col">Ending Time</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if (count($elections) > 0)
            @foreach ($elections as $election)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$election->election_type}}</td>
                    <td>{{$election->date}}</td>
                    <td>{{$election->start}}</td>
                    <td>{{$election->end}}</td>
                <td>
                  <a class="btn btn-primary" href="{{route('election.show', $election->id)}}" role="button">View</a>
                </td>
                </tr>
            @endforeach
        @else <p>No Data Found</p>
        @endif
        </tbody>
      </table>
@endsection