@extends('layouts.adminMain')
@section('Title', 'QMS Edit Employee')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="py-4">
        <form action="{{ route('updateKaryawan',$karyawan->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" id="formGroupExampleInput" value="{{ $karyawan->name }}">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" id="formGroupExampleInput2" value="{{ $karyawan->username }}">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" id="formGroupExampleInput2" value="{{ $karyawan->email }}">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Phone</label>
            <input type="text" id="Phone" name="Phone" class="form-control" id="formGroupExampleInput2" value="{{ $karyawan->Phone }}">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</main>

@endsection