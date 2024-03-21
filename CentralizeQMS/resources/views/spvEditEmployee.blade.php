@extends('layouts.supervisorMain')
@section('Title', 'SPV Manage Employee')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h3 class="mt-5">Employee List</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach($daftar as $lists)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $lists->name }}</td>
          <td id="username">{{ $lists->username }}</td>
          <td>{{ $lists->email }}</td>
          <td>{{ $lists->Phone }}</td>
          <td>
            <a href="{{ route('spvEditKaryawan',$lists->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
          </td>
        </tr>
          @endforeach
      </tbody>
    </table>
</main>

@endsection