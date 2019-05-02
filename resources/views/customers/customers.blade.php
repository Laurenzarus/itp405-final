@extends('layouts.frame')

@section('title', 'Customers')

@section('main')
    <div>
        <ol>
            @foreach ($customers as $row)
                <li><a href='/customers/{{$row->CustomerID}}/edit'>{{$row->FirstName}} {{$row->LastName}} lives in {{$row->City}}</a></li>
            @endforeach
        </ol>
    </div>
@endsection