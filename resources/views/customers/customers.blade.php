@extends('layouts.frame')

@section('title', 'Customers')

@section('main')
    <div class="jumbotron text-center" style="font-weight:bolder; font-size: 40px;">
        Customer List
    </div>
    <div>
        <ul class="text-center" style="list-style-type: none;">
            @foreach ($customers as $row)
                <li>
                    <a href='/customers/{{$row->CustomerID}}/edit' style="color: black;">
                        <span style="color: firebrick;">{{$row->FirstName}} {{$row->LastName}}</span> 
                        is a(n) <span style="color: blue;">{{$row->Title}}</span> and lives in 
                        <span style='color: green;'>{{$row->City}}</span>. Born on 
                        <span style='color: purple;'>{{$row->Birthday}}</span>. 
                    </a>
                    @if(Auth::check())
                        <a href='/customers/{{$row->CustomerID}}/delete' style='color: red;'>
                            Delete this Customer
                        </a>
                    @endif
                </li>
            @endforeach
            @if(Auth::check())
            <div class='text-danger' style="font-weight: bolder; font-size: 20px;">
                Be wary: Deleting Customers will also delete their corresponding orders.
            </div>
            <div>
                <a href="/customers/new">Add a new customer</a>
            </div>
            @else
            <div>
                Login as a user to add a new customer!
            </div>
            @endif
        </ul>
    </div>
@endsection