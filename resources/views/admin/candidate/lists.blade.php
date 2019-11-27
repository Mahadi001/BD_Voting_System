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
        {{-- @if (count($candidates) > 0)
            @foreach ($candidates as $candidate) --}}
                <tr>
                    <th scope="row">1</th>
                    <td>bid</td>
                    <td>fname</td>
                    <td>lname</td>
                <td>
                  <a class="btn btn-primary" href="#" role="button">View</a>
                  <a class="btn btn-success" href="#" role="button">Approve</a>
                  <a class="btn btn-danger" href="#" role="button">Delete</a>
                </td>
                </tr>
            {{-- @endforeach
        @endif --}}
        </tbody>
      </table>
@endsection