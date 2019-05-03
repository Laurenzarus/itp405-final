@extends('layouts.frame')

@section('title', 'Register New Order')

@section('main')
<div class="jumbotron text-center">
    <h2>Register an Order</h2>
</div>
<form action="/orders" method="POST" class="mb-3">
    @csrf
    <div class="form-group ml-3">
        <label for="name">Customer Name</label>
        <select class="form-control" id="name" name="name">
            <option value="{{old('name')}}" selected>Select the Customer</option>
            @forelse ($customers as $row)
                <option value="{{$row->CustomerID}}" 
                    {{$row->CustomerID == old('name') ? "selected" : ""}}>
                    {{$row->FirstName}} {{$row->LastName}}
                </option>
            @empty
                <option value="">No Customers!</option>
            @endforelse
        </select>
        <small class="text-danger">{{$errors->first('name')}}</small>
    </div>
    <div class="form-group col-8">
        <label for="item">Item</label>
        <input type="text" class="form-control" id="item" placeholder="Item description or name" value="{{old('item')}}" name="item">
        <small class="text-danger">{{$errors->first('item')}}</small>
    </div>
    <div class="form-group ml-3">
            <label for="amount">Bulk Amount</label>
            <select class="form-control" id="amount" name="amount">
                <option value="{{old('amount')}}" selected>Select a Bulk Amount</option>
                @forelse ($amounts as $row)
                    <option value="{{$row->AmountID}}" {{$row->AmountID == old('amount') ? "selected" : ""}}>
                        {{$row->Amount}}
                    </option>
                @empty
                    <option value="">No Amounts!</option>
                @endforelse
            </select>
            <small class="text-danger">{{$errors->first('amount')}}</small>
        </div>
    <div class="form-group col-2">
        <label for="orderDate">Order Date (yyyy-mm-dd)</label>
        <input type="text" class="form-control" id="orderDate" placeholder="Order Date" value="{{old('orderDate')}}" name="orderDate">
        <small class="text-danger">{{$errors->first('orderDate')}}</small>
    </div>
    <div class="form-group col-2">
        <label for="shipDate">Ship Date (yyyy-mm-dd)</label>
        <input type="text" class="form-control" id="shipDate" placeholder="Ship Date" value="{{old('shipDate')}}" name="shipDate">
        <small class="text-danger">{{$errors->first('shipDate')}}</small>
    </div>
    <div class="form-group ml-3">
        <label for="shipper">Shipping Company</label>
        <select class="form-control" id="shipper" name="shipper">
            <option value="{{old('shipper')}}" selected>Select a Shipping Company</option>
            @forelse ($shippers as $row)
                <option value="{{$row->ShipperID}}" {{$row->ShipperID == old('shipper') ? "selected" : ""}}>
                    {{$row->CompanyName}}
                </option>
            @empty
                <option value="">No Shipment Companies!</option>
            @endforelse
        </select>
        <small class="text-danger">{{$errors->first('shipper')}}</small>
    </div>
    <button class='btn btn-primary ml-3' type="submit">Save New Customer Order</button>
</form>
@endsection