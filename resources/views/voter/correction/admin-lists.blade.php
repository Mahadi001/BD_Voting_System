@extends('layouts.dashboard')
@section('admin-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Birth Certificate Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pendings as $pending)
                <tr>
                    <th scope="row">{{$pending->id}}</th>
                    <td>{{$pending->bid}}</td>
                    <td>{{$pending->fname}}</td>
                    <td>{{$pending->lname}}</td>
                <td>
                  <a class="btn btn-primary" href="/correction/{{$pending->id}}" role="button">View</a>
                  {!!Form::open(['action' => ['CertificateController@destroy', $pending->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!}
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
@endsection