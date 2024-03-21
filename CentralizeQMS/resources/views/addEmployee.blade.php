@extends('layouts.adminMain')
@section('Title', 'QMS Add Employee')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="py-4">
        <form action="{{ route('insertKaryawan') }}" method="post">
            @csrf
            <div class="form-group mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" id="formGroupExampleInput2" placeholder="Username">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="example@domain.com">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Phone</label>
            <input type="text" id="Phone" name="Phone" class="form-control" id="formGroupExampleInput2" placeholder="0812345678">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Assign Category</label>
            <select class="form-control custom-select" id="Assign_Category" name="Assign_Category">
                <option selected>Assign a Category</option>
                @foreach($assignCategory as $category)
                <option value="{{ $category->id }}">{{ $category->QName }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Role</label>
            <select class="form-control custom-select" id="role" name="role">
                <option selected>Assign a Role</option>
                <option value="2">Supervisor</option>
                <option value="1">Employee</option>
            </select>
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">password</label>
            <input type="text" id="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</main>

@endsection