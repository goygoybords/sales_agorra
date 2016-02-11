<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
   	public $timestamps = false; 
    protected $fillables = ['company_name' , 'address' , 'contact_person' , 'contact_number',
    						   'email' , 'balance' ,'status'
    					   ];
}
