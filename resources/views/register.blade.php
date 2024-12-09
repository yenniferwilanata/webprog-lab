@extends('extend.guest')

@section('title', 'Register')
@section('content')
@include('include.error')
    <h1 class="text-center">Register</h1>
    <form action="/register" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" placeholder="Has to end with @gmail.com" name="email" required style="width: 400px">
        </div>
        <div class="mb-4">
            <label for="name" class="form-label">Username</label>
            <input id="name" type="text" class="form-control" placeholder="Minimum 5 Characters, Maximum 50 Characters" name="name" required style="width: 400px">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control" placeholder="Minimum 5 Characters, Maximum 255 Characters" name="password" required style="width: 400px">
        </div>
        <div class="mb-4">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input id="confirm_password" type="password" class="form-control" placeholder="Has to be the same with Password Field" name="conPassword" required style="width: 400px">
        </div>
        <button type="submit" class="btn btn-secondary mb-4" style="width: 400px">Register</button>
        <div class="mb-4" style="text-align: center">
            <p>Already have an account?  <a class="text-decoration-none" style="color: yellow" href="login">Log in</a></p>
        </div>
    </form>
@endsection