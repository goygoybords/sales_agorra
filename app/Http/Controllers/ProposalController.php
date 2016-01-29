<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proposal;
use App\ServiceCategory;
use Auth;
use App\ProposalDetail;
use App\ProposalAttachment;
use DB;
class ProposalController extends Controller
{
    //
    public function __construct()
    {
        //session_start();
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

    public function postProposal(Request $request)
    {
        $salesperson = Auth::user()->id;
        $services = $request->input('services');
        $file = $request->file('attachment');
        $data = $request->all();

        $rules = [ 'proposal_date' => 'required|date', 
                   'project_name' => 'required|min:10',
                   'client' => 'required',
                   'services' => 'required',
                   'attachment' => 'required|mimes:doc,docx,pdf,xls',
                 ];

        $this->validate($request,$rules);
        
        $filename = $file->getClientOriginalName();
        $type = $file->getMimeType();

        $attachment = new ProposalAttachment();
        $attachment->filename = $filename;
        $attachment->filetype = $type;
        $attachment->file = $data['attachment'];
        $attachment->status = 1;
        $attachment->save();
           
        $attachment_id = DB::table('proposal_attachment')->max('proposal_attachment_id');

        $proposal = new Proposal();
        $proposal->proposal_date = date('Y-m-d', strtotime($data['proposal_date']));
        $proposal->project_name = $data['project_name'];
        $proposal->salesperson = $salesperson;
        $proposal->client_id = $data['client'];
        $proposal->total = $data['total'];
        $proposal->proposal_attachment_id = $attachment_id;
        $proposal->status = 1;
        $proposal->save();

        $get_last_id = DB::table('proposals')->max('proposal_id');

        for($i=0; $i < count($services) ; $i++)
        {
            $detail = new ProposalDetail();
            $detail->proposal_id = $get_last_id;
            $detail->service_category_id = $services[$i];
            $detail->status = 1;
            $detail->save();
        }
        return redirect('/newProposal')->with('msg' , 'Proposal Record Stored');
    }

    public function listOfServices()
    {
    	$services = ServiceCategory::where('status', 1)
                        ->get();
        return $services;
    }
    public function listOfProposals()
    {
        $proposals = DB::table('proposals')
            ->join('clients', 'proposals.client_id', '=', 'clients.client_id')
            ->join('users', 'users.id', '=', 'proposals.salesperson')
            ->join('proposal_attachment', 'proposal_attachment.proposal_attachment_id', 
                '=', 'proposals.proposal_attachment_id')
            ->select('proposals.proposal_id', 'proposals.project_name','proposals.proposal_date',
               'proposals.total' , 'proposal_attachment.filename', 'clients.company_name', 'users.name')
            ->get();
        return $proposals;
    }
    public function getListService()
    {
        $list = $this->listOfProposals();
        $title = "Proposal Form";
        return view('proposals.proposal_list')->with(compact('title', 'list'));
    }

    public function downloadAttachment($filename)
    {
        echo $filename;
    }
}
