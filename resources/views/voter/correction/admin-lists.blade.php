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
                <tr>
                    <th scope="row">{{$corrections->id}}</th>
                    <td>{{$corrections->bid}}</td>
                    <td>{{$corrections->fname}}</td>
                    <td>{{$corrections->lname}}</td>
                <td>
                  <a class="btn btn-primary" href="/correction/{{$corrections->id}}" role="button">View</a>
                  <a class="btn btn-success" href="/correction/{{$corrections->id}}/update" role="button">Approve</a>
                  {!!Form::open(['action' => ['CertificateController@destroy', $corrections->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!}
                </td>
                </tr>
        </tbody>
      </table>
@endsection