@extends('layouts.admin')
@section('admin-content')
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Middle</th>
            <th scope="col">Last</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Father's Name</th>
            <th scope="col">Mother's Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @if (count($certificates) > 0)
            @foreach ($certificates as $certificate)
                <tr>
                    <th scope="row">1</th>
                <td>{{$certificate->fname}}</td>
                <td>{{$certificate->mname}}</td>
                <td>{{$certificate->lname}}</td>
                <td>{{$certificate->dateOfBirth}}</td>
                <td>{{$certificate->fathername}}</td>
                <td>{{$certificate->mothername}}</td>
                <td>
                    {{-- <a class="btn btn-primary" href="/certificate/{{$certificate->id}}" role="button">View</a> --}}
                <a class="btn btn-success" href="{{route('certificate.edit',$certificate->id)}}" role="button">Edit</a>
                    {{-- {!!Form::open(['action' => ['CertificateController@destroy', $certificate->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!} --}}
                </td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>
@endsection