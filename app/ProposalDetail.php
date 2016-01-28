<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalDetail extends Model
{
    //
    protected $table = 'proposals_detail';
   	public $timestamps = false; 

   	protected $fillables = ['proposal_id' ,'services','status'];

   	public function proposal()
    {
        return $this->belongsTo('App\Proposal');
    }
}
