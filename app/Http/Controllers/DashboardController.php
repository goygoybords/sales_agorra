<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session_start();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo Auth::user()->checkRole();

        $title = "Dashboard";
        return view('dashboard.home')->with(compact('title'));
    }
}
