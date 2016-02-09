<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Proposal;
use App\Sale;
use App\SaleAttachment;

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
    public function insertSalesRecord(Request $request)
    {
        $data = $request->only('proposal' , 'sales_date' , 'terms' , 
            'total' , 'isVatable', 'isCommissionable', 'attachment');
        
        $file = $request->file('attachment');
        $rules = [ 'proposal' => 'required', 
                   'sales_date' => 'required',
                   'terms' => 'required',
                   'isVatable' => 'required',
                   'isCommissionable' => 'required',
                   'attachment' => 'required|mimes:doc,docx,pdf,xls'
                 ];
        
        $this->validate($request,$rules);

        $filename = $file->getClientOriginalName();
        $type = $file->getMimeType();

        $attachment = new SaleAttachment();
        $attachment->filename = $filename;
        $attachment->filetype = $type;
        $attachment->file = addslashes(file_get_contents($file)); //$data['attachment'];
        $attachment->status = 1;
        $attachment->save();
           
        $attachment_id = DB::table('sale_attachment')->max('sale_attachment_id');

        $sales = new Sale;
        $sales->sales_date = date('Y-m-d', strtotime($data['sales_date']));
        $sales->proposal_id = $data['proposal'];
        $sales->sale_attachment_id = $attachment_id ;
        $sales->terms = $data['terms'];
        $sales->isVatable = $data['isVatable'];
        $sales->isCommisionable = $data['isCommissionable'];
        $sales->total = $data['total'];
        $sales->status = 1;
        $sales->save();

        return redirect('/newSale')->with('msg' , 'Sale Record Stored');
        
    }
    public function getSalesList()
    {
    	$title = "List of Sales";
        $sales = $this->listOfSales();
    	return view('sales.sales_list')->with(compact('title', 'sales'));
    }
    public function listOfAllProposals()
    {
        $proposals = DB::table('proposals')
            ->select('proposal_id')
            ->where('status', 1)
            ->get();
        return $proposals;
    }

    public function listOfSales()
    {
        $sales = DB::table('sales')
            ->join('proposals', 'sales.proposal_id', '=', 'proposals.proposal_id')
            ->join('clients', 'proposals.client_id', '=', 'clients.client_id')
            ->join('users', 'users.id', '=', 'proposals.salesperson')
            ->select('sales.*', 'proposals.project_name','clients.company_name', 'users.name')
            ->where('sales.status', '!=' , 0)
            ->get();
        return $sales;
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

    public function editSales($id)
    {
        $sales = Sale::where('status' , 1)
                        ->where('sales_id' , $id)
                        ->first();

        $prop = DB::table('proposals')
            ->join('clients', 'proposals.client_id', '=', 'clients.client_id')
            ->join('users', 'users.id', '=', 'proposals.salesperson')
            ->select('proposals.project_name',
               'proposals.total' , 'clients.company_name', 'users.name')
            ->where('proposals.proposal_id' ,$sales->proposal_id)
            ->where('proposals.status', 1)
            ->first();

        $title = "Edit Sales Record";
        return view('sales.sales_entry')->with(compact('title' , 'sales', 'prop'));
    }
    public function updateSales(Request $request, $id)
    {
        $data = $request->only('terms' , 'isVatable', 'isCommissionable', 'attachment');
        $file = $request->file('attachment');
        
        $rules = [ 
                   'terms' => 'required',
                   'isVatable' => 'required',
                   'isCommissionable' => 'required',
                   'attachment' => 'mimes:doc,docx,pdf,xls'
                 ];
        
        $this->validate($request,$rules);
    }
}
