@extends('layouts.frame')

@section('title', 'Orders')

@section('main')
    <div class="jumbotron text-center" style="font-weight:bolder; font-size: 40px;">
        Order List
    </div>
    <div>
        <ul class="text-center" style="list-style-type: none;">
            @foreach ($orders as $row)
                <li>
                    <span href='/orders/{{$row->OrderID}}/edit' style="color: black;">
                        <span style="color: firebrick;">{{$row->FirstName}} {{$row->LastName}}</span> 
                        ordered <span style="color: blue;">{{$row->Item}}</span> ({{$row->Amount}}) on
                        <span style='color: green;'>{{$row->OrderDate}}</span>, which were shipped on 
                        <span style='color: purple;'>{{$row->ShippedDate}}</span> by 
                        <span style='color:chocolate;'>{{$row->CompanyName}}</span>.
                    </span>
                    @if (Auth::check())
                    <a style='color: red;' href='/orders/{{$row->OrderID}}/delete'>
                        Delete this order
                    </a>
                @endif
                </li>
            @endforeach
            @if(Auth::check())
            <div>
                <a href="/orders/new">Add a new order</a>
            </div>
            @else
            <div>
                <a href='/login'>
                    Login as a user to add a new order!
                </a>
            </div>
            @endif
        </ul>
    </div>
@endsection