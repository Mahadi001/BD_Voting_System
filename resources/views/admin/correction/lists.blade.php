@extends('layouts.admin')
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
          @foreach ($corrections as $correction)
                <tr>
                    <th scope="row">{{$correction->id}}</th>
                    <td>{{$correction->bid}}</td>
                    <td>{{$correction->fname}}</td>
                    <td>{{$correction->lname}}</td>
                <td>
                <a class="btn btn-primary" href="{{ route('correction.show',$correction->id)}}" role="button">View</a>
                  {{-- {!!Form::open(['action' => ['CertificateController@destroy', $correction->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                  {!!Form::close()!!} --}}
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
@endsection