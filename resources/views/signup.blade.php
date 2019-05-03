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
            <small class="text-danger">{{$errors->first('username')}}</small>
        </div>
        <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" name='password'id="password" 
            value='@if(old("password")){{old('password')}}@endif' placeholder="Password">
            <small class="text-danger">{{$errors->first('password')}}</small>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Sign Up!</button>
        <div class="ml-3">
            <small class='text-secondary'>
                Already have admin account? Click <a href='/login'>here</a> to login!
            </small>
        </div>
    </form>
@endsection