<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class CustomersController extends Controller
{
    function index() {
        $query = DB::table('Customers')->select('*');

        $customers = $query->get();

        return view('customers.customers', [
            'customers' => $customers
        ]);
    }

    function show($id) {
        $query = DB::table('Customers')
            ->select('*')
            ->where('CustomerID', '=', $id);

        $customer = $query->first();

        return view('customers.edit', [
            'customer' => $customer,
            'id' => $id
        ]);
    }

    function create(Request $request) {
        return view('customers.create');
    }

    function store(Request $request) {
        $input = $request->all();

        //validate
        $validation = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            'title' => 'required',
            'city' => 'required',
            'birthday' => 'required|date_format:Y-m-d'
        ]);

        if ($validation->fails()) {
            return redirect('/customers/new')
            ->withInput()
            ->withErrors($validation);//return with errors if failed
        }

        //if passed, data is ok so insert into DB

        DB::table('Customers')->insert([
            'LastName' => $request->lastName,
            'FirstName' => $request->firstName,
            'Title' => $request->title,
            'City' => $request->city,
            'Birthday' => $request->birthday
        ]);

        return redirect('/customers');
    }

    function edit(Request $request) {

        $input = $request->all();

        $validation = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            'title' => 'required',
            'city' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'birthday' => 'required|date_format:Y-m-d'        
        ]);

        if ($validation->fails()) {
            return redirect('/customers/' . $request->id . '/edit')
                ->withInput()
                ->withErrors($validation);
        }

        //otherwise continue and update customer record

        $query = DB::table('Customers')
            ->where('CustomerID', '=', $request->id)
            ->update([
                'FirstName' => $request->firstName,
                'LastName' => $request->lastName,
                'Title' => $request->title,
                'City' => $request->city,
                'Birthday' => $request->birthday
        ]);
        
        return redirect('/customers');
    }

    function delete($id) {
        $query = DB::table('Customers')
            ->where('CustomerID', '=', $id);

        $ordersCheck = DB::table('Orders')
            ->where('CustomerID', '=', $id);

        $ordersCheck->delete();
        $query->delete();

        return redirect('/customers');
    }
}
