<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class OrdersController extends Controller
{
    function index() {

        $query = DB::table('Orders')
            ->select('*')
            ->join('Customers', 'Orders.CustomerID', '=', 'Customers.CustomerID')
            ->join('Shippers', 'Orders.ShipperID', '=', 'Shippers.ShipperID')
            ->join('Amounts', 'Orders.AmountID', '=', 'Amounts.AmountID');

        $orders = $query->get();

        return view('orders.orders', [
            'orders' => $orders
        ]);
    }

    function create() {

        $query = DB::table('Customers')
            ->select('*');

        $customers = $query->get();

        $query2 = DB::table('Shippers')
            ->select('*');

        $shippers = $query2->get();

        $amounts = DB::table('Amounts')
            ->select('*')
            ->get();

        return view('orders.create', [
            'customers' => $customers,
            'shippers' => $shippers,
            'amounts' => $amounts
        ]);
    }

    function store(Request $request) {

        $input = $request->all();


        //validate
        $validation = Validator::make($input, [
            'name' => 'required',
            'item' => 'required',
            'shipDate' => 'required|date_format:Y-m-d',
            'orderDate' => 'required|date_format:Y-m-d',
            'amount' => 'required|numeric',
            'shipper' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect('/orders/new')
            ->withInput()
            ->withErrors($validation);//return with errors if failed
        }

        //if passed, data is ok so insert into DB

        DB::table('Orders')->insert([
            'CustomerID' => $request->name,
            'Item' => $request->item,
            'ShippedDate' => $request->shipDate,
            'OrderDate' => $request->orderDate,
            'AmountID' => $request->amount,
            'ShipperID' => $request->shipper
        ]);

        return redirect('/orders');
    }

    function delete($id) {

        $query = DB::table('Orders')
            ->where('OrderID', '=', $id);

        //deletion
        $query->delete();

        return redirect('/orders');
    }
}
