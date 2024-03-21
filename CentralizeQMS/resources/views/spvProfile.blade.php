@extends('layouts.supervisorMain')
@section('Title', 'Supervisor Profile')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="py-4">
    <table class="table table-dark table-striped">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ Auth::user()->name }} <span class="badge bg-warning">Supervisor</span></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>{{ Auth::user()->username }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>:</td>
            <td>{{ Auth::user()->Phone }}</td>
        </tr>
    </table>
</div>
</main>

@endsection