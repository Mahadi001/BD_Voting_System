@extends('layouts.political_party')
@section('political_party-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Election</th>
            <th scope="col">Position</th>
            <th scope="col">Zone</th>
            <th scope="col">Admin Approved</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if (count($candidateRequest) > 0)
            @foreach ($candidateRequest as $candidate)
                <tr>
                    <th scope="row">{{ $candidate->id }}</th>
                    <td>{{ $candidate->fullname }}</td>
                    <td>{{ $candidate->election->name }}</td>
                    <td>{{ $candidate->position_name }}</td>
                    <td>{{ $candidate->electionDetail->zone }}</td>
                    <td>@if($candidate->approved_by_ec == 1) YES @else NO @endif</td>
                <td>
                  {{-- <a class="btn btn-primary" href="#" role="button">View</a> --}}
                  @if($candidate->approved_by_party != 1)
                    <a class="btn btn-success" href="{{route('candidate.request.approval',$candidate->id)}}" role="button">Approve</a>
                  @endif
                  @if($candidate->approved_by_ec != 1)
                   {!!Form::open(['action' => ['CandidateController@destroy', $candidate->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                    @endif
                </td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
@endsection