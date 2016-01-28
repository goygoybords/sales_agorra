<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
   	protected $table = 'proposals';
   	public $timestamps = false; 

   	protected $fillables = ['proposal_date' , 'project_name' , 'client' ,
    						   'quotation_number' , 'attachment', 'date_sent' ,'status'
    					   ];

  	public function customer()
    {
        return $this->hasMany('App\Client', 'client_id');
    }

    public function salesman()
    {
        return $this->hasMany('App\User', 'salesperson');
    }
   	
}

