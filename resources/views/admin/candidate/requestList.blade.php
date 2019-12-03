@extends('layouts.admin')
@section('admin-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Election</th>
            <th scope="col">Position</th>
            <th scope="col">Zone</th>
            <th scope="col">Candidate Name</th>
            <th scope="col">Party</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if (count($candidateRequest) > 0)
            @foreach ($candidateRequest as $candidate)
                <tr>
                    <th scope="row">{{ $candidate->id }}</th>
                    <td>{{ $candidate->election->name }}</td>
                    <td>{{ $candidate->position_name }}</td>
                    <td>{{ $candidate->electionDetail->zone }}</td>
                    <td>{{ $candidate->fullname }}</td>
                    <td>{{ $candidate->party->name }}</td>
                <td>
                  
                  @if($candidate->approved_by_ec != 1)
                    <a class="btn btn-success" href="{{route('admin.candidate.request.approval',$candidate->id)}}" role="button">Approve</a>
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