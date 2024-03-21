@extends('layouts.adminMain')
@section('Title', 'QMS Manage Category')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" onload="checkMaxCats()">
    <h1 class="mt-5">Category List</h1>
    <p style="float: right">
      Max Category is 5 ! 
      @if($kochengCek == 5)
        <a href="#" class="btn btn-success disabled" id="addCat"><i class="fa-solid fa-file-circle-plus"></i></a>
      @elseif($kochengCek < 5)
        <a href="{{ route('addCategory') }}" class="btn btn-success" id="addCat"><i class="fa-solid fa-file-circle-plus"></i></a>
      @endif
    </p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Queue Code</th>
          <th scope="col">Queue Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach($kocheng as $lists)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $lists->QType }}</td>
          <td>{{ $lists->QName }}</td>
          <td>
            <a href="{{ route('editCategory',$lists->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            <label>|</label>
            <a href="{{ route('deleteCategory',$lists->id) }}" id="delete"><i class="fa-solid fa-trash-can" style="color : red"></i></a>
          </td>
        </tr>
          @endforeach
      </tbody>
    </table>
</main>

@endsection