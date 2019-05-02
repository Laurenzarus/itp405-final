@extends('layouts.frame')

@section('title', 'Sign Up')

@section('main')
    <div class="jumbotron text-primary text-center" style="font-size: 45px; font-weight: bolder;">
        Sign Up
    </div>
    <form method="post">
        @csrf
        <div class="form-group col-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" name='username' id="username" 
            value='@if(old("username")){{old('username')}}@endif' placeholder="Username">
        </div>
        <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name='password'id="password" 
            value='@if(old("password")){{old('password')}}@endif' placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up!</button>
        <div>
            <small class='text-secondary'>
                Already have admin account? Click <a href='/signup'>here</a> to login!
            </small>
        </div>
    </form>
@endsection