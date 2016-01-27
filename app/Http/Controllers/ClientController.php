<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listClients()
    {
    	$title = "List of Clients";
    	$list = $this->listOfClients();
        return view('clients.client_list')->with(compact('title' , 'list'));
    }

    public function newClient()
    {
    	$title = "New Client";
        return view('clients.client_new')->with(compact('title'));
    }

    public function insertClientRecord(Request $request)
    {
    	$data = $request->only('company_name' , 'address' , 'contact_person' , 
    		'contact_number' , 'credit_limit', 'email');
        
        $rules = [ 'company_name' => 'required|unique:clients,company_name|max:255|min:10', 
        		   'address' => 'required|min:10',
        		   'contact_person' => 'required|min:10',
  				   'email' => 'required|email|min:10',
                   'contact_number' => 'required|numeric|digits_between:8,12',
                   'credit_limit' => 'required|numeric|digits_between:5,15'
                 ];
        $this->validate($request,$rules);
        
        $client = new Client();
        $client->company_name = $data['company_name'];
        $client->company_address = $data['address'];
        $client->contact_person = $data['contact_person'];
        $client->contact_number = $data['contact_number'];
        $client->email = $data['email'];
        $client->credit_limit = $data['credit_limit'];
        $client->balance = 0.00;
        $client->status = 1;
        $client->save();

        return redirect('/newClient')->with('msg' , 'Client Record Stored');
    }
    public function listOfClients()
    {
        $client = Client::where('status', 1)
                        ->orderBy('client_id')
                        ->get();
        return $client;
    }

    public function editClientView($id)
    {
    	$client = Client::where('status' , 1)
                        ->where('client_id' , $id)
                        ->first();

    	$title = "Edit Client";
    	return view('clients.client_new')->with(compact('title','client'));
    }

    public function updateClientRecord(Request $request, $id)
    {
    	$data = $request->only('company_name' , 'address' , 'contact_person' , 
    		'contact_number' , 'credit_limit', 'email');
        
        $rules = [ 'company_name' => 'required|max:255|min:10', 
        		   'address' => 'required|min:10',
        		   'contact_person' => 'required|min:10',
  				   'email' => 'required|email|min:10',
                   'contact_number' => 'required|numeric|digits_between:8,12',
                   'credit_limit' => 'required|numeric|digits_between:5,15'
                 ];

        $this->validate($request,$rules);
        $updates = ['company_name' => $data['company_name'] , 
                    'company_address' => $data['address'],
                    'contact_person' => $data['contact_person'],
                    'contact_number' => $data['contact_number'],
                    'email' => $data['email'],
                    'credit_limit' => $data['credit_limit']
                   ];
        
        $client = Client::where('status' , 1)
                    ->where('client_id' , $id)
                    ->update($updates);

        return redirect('/editClient/'. $id)->with('msg' , 'Client Record Updated');

    }
}
