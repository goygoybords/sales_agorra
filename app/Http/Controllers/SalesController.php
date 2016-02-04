<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Proposal;

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
        $proposals = $this->listOfAllProposals();
    	return view('sales.sales_entry')->with(compact('title' , 'proposals'));
    }
    public function getSalesList()
    {
    	$title = "List of Sales";
    	return view('sales.sales_list')->with(compact('title'));
    }
    public function listOfAllProposals()
    {
        $proposals = DB::table('proposals')
            ->select('proposal_id')
            ->where('status', 1)
            ->get();
      
        return $proposals;
    }

    public function getSalesData(Request $request)
    {
        $id = $request->input('proposal_id');

        $proposals = DB::table('proposals')
            ->join('clients', 'proposals.client_id', '=', 'clients.client_id')
            ->join('users', 'users.id', '=', 'proposals.salesperson')
            ->select('proposals.project_name',
               'proposals.total' , 'clients.company_name', 'users.name')
            ->where('proposals.proposal_id' ,$id)
            ->where('proposals.status', 1)
            ->get();
        return $proposals;
    }
}
