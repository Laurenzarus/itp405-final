<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestsController extends Controller
{
    function index() {
        $query = DB::table('Employees')->select('*');

        $employees = $query->get();

        return view('test', [
            'employees' => $employees
        ]);
    }
}
