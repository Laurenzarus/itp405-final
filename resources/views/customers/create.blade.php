@extends('layouts.frame')

@section('title', 'Add a Customer')

@section('main')
<div class="jumbotron text-center">
    <h2>Add a Customer</h2>
</div>
<form action="/customers/new" method="POST">
    @csrf
    <div class="form-row pl-3">
            <div class="form-group col-4">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name='firstName' id="firstName" 
                value='@if(old("firstName")){{old('firstName')}}@endif' placeholder="First Name">
                <small class="text-danger">{{$errors->first('firstName')}}</small>
            </div>
            <div class="form-group col-4">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name='lastName' id="lastName" 
                value='@if(old('lastName')){{old('lastName')}}@endif' placeholder="Last Name">
                <small class="text-danger">{{$errors->first('lastName')}}</small>
            </div>
        </div>
    <div class="form-group col-8">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" value="{{old('title')}}" name="title">
        <small class="text-danger">{{$errors->first('title')}}</small>
    </div>
    <div class="form-group col-8">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" placeholder="City" name="city">
        <small class="text-danger">{{$errors->first('city')}}</small>
    </div>
    <div class="form-group col-2">
        <label for="birthday">Birth Date (yyyy-mm-dd)</label>
        <input type="text" class="form-control" id="birthday" placeholder="Birth Date" value="{{old('birthday')}}" name="birthday">
        <small class="text-danger">{{$errors->first('birthday')}}</small>
    </div>
    <button class='btn btn-primary ml-3' type="submit">Save New Customer</button>
</form>
@endsection