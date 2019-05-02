@extends('layouts.frame'){{--Gives the file knowledge of the layout.blade.php file. Don't need the extension--}}

@section('title', 'Employees'){{--Gives the value of 'home' to the section title--}}

@section('main')
    <div>
        <ol>
            @foreach ($employees as $row)
                <li><a href='/employees/{{$row->EmployeeID}}/edit'>{{$row->FirstName}} {{$row->LastName}} lives in {{$row->City}}</a></li>
            @endforeach
        </ol>
    </div>
@endsection