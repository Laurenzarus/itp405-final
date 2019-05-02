@extends('layouts.frame')

@section('title', 'Edit: {{$employee->FirstName}} {{$employee->LastName}}')

@section('main')
    <div class="jumbotron text-center text-danger" style="font-size: 32px;">
        Employee Info: {{$employee->FirstName}} {{$employee->LastName}}
    </div>
    <form method="POST" action="/employees">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" name='firstName' id="firstName" value='@if(old("firstName")){{old('firstName')}}@else{{$employee->FirstName}}@endif' placeholder="First Name">
            <small class="text-danger">{{$errors->first('firstName')}}</small>
            </div>
            <div class="form-group col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" name='lastName' id="lastName" value='@if(old('lastName')){{old('lastName')}}@else{{$employee->LastName}}@endif' placeholder="Last Name">
            <small class="text-danger">{{$errors->first('lastName')}}</small>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name='title'id="title" value='@if(old('title')){{old('title')}}@else{{$employee->Title}}@endif'placeholder="Job Title">
            <small class="text-danger">{{$errors->first('title')}}</small>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name='city' id="city" value='@if(old('city')){{old('city')}}@else{{$employee->City}}@endif' placeholder="City">
            <small class="text-danger">{{$errors->first('city')}}</small>
        </div>
        <div class="form-group">
            <label for="hireDate">Hire Date (Use form 'yyyy-mm-dd')</label>
            <input type="text" class="form-control" name='hireDate' id="hireDate" value='@if(old('hireDate')){{old('hireDate')}}@else{{$employee->HireDate}}@endif' placeholder="2000-01-01">
            <small class="text-danger">{{$errors->first('hireDate')}}</small>
        </div>
        <input type="hidden" name="id" value="{{$id}}">
        <button type="submit" class="btn btn-primary">Make Changes</button>
    </form>
@endsection