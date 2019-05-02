@extends('layouts.frame'){{--Gives the file knowledge of the layout.blade.php file. Don't need the extension--}}

@section('title', 'Test'){{--Gives the value of 'home' to the section title--}}

@section('main')
    <div>
        <ul>
            @foreach ($employees as $row)
                <li>{{$row->FirstName}} {{$row->LastName}} lives in {{$row->City}}</li>
            @endforeach
        </ul>
    </div>
@endsection