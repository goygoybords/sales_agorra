<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proposal;
use App\ServiceCategory;

class ProposalController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newProposal()
    {
    	$client = new ClientController();
    	$list = $client->listOfClients();
    	$services = $this->listOfServices();

    	$title = "Proposal Form";
        return view('proposals.proposal_entry')->with(compact('title','list','services'));
    }

    public function listOfServices()
    {
    	$services = ServiceCategory::where('status', 1)
                        ->get();
        return $services;
    	
    }
}
