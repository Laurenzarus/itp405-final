@extends('layouts.frame')

@section('title', 'Edit: {{$customer->FirstName}} {{$customer->LastName}}')

@section('main')
    <div class="jumbotron text-center text-danger" style="font-size: 32px;">
        Customer Info: {{$customer->FirstName}} {{$customer->LastName}}
    </div>
    <form method="POST" action="/customers">
        @csrf
        <div class="form-row pl-3">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name='firstName' id="firstName" value='@if(old("firstName")){{old('firstName')}}@else{{$customer->FirstName}}@endif' placeholder="First Name">
                <small class="text-danger">{{$errors->first('firstName')}}</small>
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name='lastName' id="lastName" value='@if(old('lastName')){{old('lastName')}}@else{{$customer->LastName}}@endif' placeholder="Last Name">
                <small class="text-danger">{{$errors->first('lastName')}}</small>
            </div>
        </div>
        <div class="form-group col-8">
            <label for="title">Title</label>
            <input type="text" class="form-control" name='title'id="title" value='@if(old('title')){{old('title')}}@else{{$customer->Title}}@endif'placeholder="Job Title">
            <small class="text-danger">{{$errors->first('title')}}</small>
        </div>
        <div class="form-group col-8">
            <label for="city">City</label>
            <input type="text" class="form-control" name='city' id="city" value='@if(old('city')){{old('city')}}@else{{$customer->City}}@endif' placeholder="City">
            <small class="text-danger">{{$errors->first('city')}}</small>
        </div>
        <div class="form-group col-8">
            <label for="birthday">Birth Date (Use form 'yyyy-mm-dd')</label>
            <input type="text" class="form-control" name='birthday' id="birthday" value='@if(old('birthday')){{old('birthday')}}@else{{$customer->Birthday}}@endif' placeholder="2000-01-01">
            <small class="text-danger">{{$errors->first('birthday')}}</small>
        </div>
        <input type="hidden" name="id" value="{{$id}}">
        <button type="submit" class="btn btn-primary ml-3">Make Changes</button>
    </form>
@endsection