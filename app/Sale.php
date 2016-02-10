<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'sales';
   	public $timestamps = false; 
  	
  	 protected $fillable = [
  	 'proposal' , 'sales_date' , 'terms' , 'isVatable', 'isCommissionable', 
  	 'attachment','status'
    ];

}
