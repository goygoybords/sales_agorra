<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    //
    public function __construct()
    {
        session_start();
        $this->middleware('auth');
    } 

    public function getSalesEntry()
    {
    	$title = "Sales Entry Form";
    	return view('sales.sales_entry')->with(compact('title'));
    }
    public function getSalesList()
    {
    	$title = "List of Sales";
    	return view('sales.sales_list')->with(compact('title'));
    }
}
