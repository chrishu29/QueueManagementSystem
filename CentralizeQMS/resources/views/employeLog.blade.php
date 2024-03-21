@extends('layouts.main')
@section('Title', 'QMS Employee Login')
@section('container')
<div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-4 fw-normal">LOG IN EMPLOYEE</h1>
              <form method="post" action="{{ route('postLogin') }}" id="loginForm">
              @csrf
                <div class="form-floating">
                  <input type="text" name="username" class="form-control @error('Username') is-invalid @enderror" id="floatingInput" placeholder="Username" autofocus required>
                  <label for="floatingInput">Enter Your Username</label>
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                <!-- <p class="mt-5 mb-3 text-muted">&copy; 2023</p> -->
              </form>
            </main>
        </div>
    </div>
@endsection