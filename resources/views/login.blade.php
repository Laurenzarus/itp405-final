@extends('layouts.frame')

@section('title', 'Admin User Login')

@section('main')
    <div class="jumbotron text-primary text-center" style="font-size: 45px; font-weight: bolder;">
        Login As Admin User
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
        <button type="submit" class="btn btn-primary ml-3">Login</button>
        <small class="text-danger">{{$errors->first('message')}}</small>
        <div class="ml-3">
            <small class='text-secondary'>
                Don't have an admin account? Click <a href='/signup'>here</a> to create yours!
            </small>
        </div>
    </form>
@endsection