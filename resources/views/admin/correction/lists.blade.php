@extends('layouts.dashboard')
@section('admin-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Application</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if (count($corrections) > 0)
            @foreach ($corrections as $correction)
                <tr>
                    <th scope="row">1</th>
                <td>{{$correction->subject}}</td>
                <td>{{$correction->body}}</td>
                <td>
                  <a class="btn btn-primary" href="/correction/{{$correction->id}}" role="button">View</a>
                  <a class="btn btn-success" href="#" role="button">Edit</a>
                  <a class="btn btn-danger" href="#" role="button">Delete</a>
                </td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
@endsection