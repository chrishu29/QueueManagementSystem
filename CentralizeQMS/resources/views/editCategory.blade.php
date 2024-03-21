@extends('layouts.adminMain')
@section('Title', 'QMS Edit Category')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="py-4">
        <form action="{{ route('updateCategory',$kochengForm->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
            <label for="formGroupExampleInput" class="form-label">Queue Code</label>
            <input type="text" id="QType" name="QType" class="form-control" id="formGroupExampleInput" value="{{ $kochengForm->QType }}">
            </div>
            <div class="form-group mb-3">
            <label for="formGroupExampleInput2" class="form-label">Queue Name</label>
            <input type="text" id="QName" name="QName" class="form-control" id="formGroupExampleInput2" value="{{ $kochengForm->QName }}">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </form>
    </div>
</main>

@endsection