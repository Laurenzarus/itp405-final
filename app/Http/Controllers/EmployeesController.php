<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class EmployeesController extends Controller
{
    function index() {
        $query = DB::table('Employees')->select('*');

        $employees = $query->get();

        return view('employees.employees', [
            'employees' => $employees
        ]);
    }

    function show($id) {
        $query = DB::table('Employees')
            ->select('*')
            ->where('EmployeeID', '=', $id);

        $employee = $query->first();

        return view('employees.edit', [
            'employee' => $employee,
            'id' => $id
        ]);
    }

    function edit(Request $request) {

        $input = $request->all();

        $validation = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            'title' => 'required|alpha',
            'city' => 'alpha',
            'hireDate' => 'required|date_format:Y-m-d'        
        ]);

        if ($validation->fails()) {
            return redirect('/employees/' . $request->id . '/edit')
                ->withInput()
                ->withErrors($validation);
        }

        //otherwise continue and update employee record

        $query = DB::table('Employees')
            ->where('EmployeeID', '=', $request->id)
            ->update([
                'FirstName' => $request->firstName,
                'LastName' => $request->lastName,
                'Title' => $request->title,
                'City' => $request->city,
                'HireDate' => $request->hireDate
        ]);

        return redirect('/employees');
    }
}
