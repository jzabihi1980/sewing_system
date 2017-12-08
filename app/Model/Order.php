<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'user_id' ,'client_id', 'master_id','date_priem' , 'date_end', 'price', 'materials_id', 'work_dops_id', 'autos_id', 'status'
    ];

	protected $dates = [
		'data_priem' , 'data_end'
	];
	public function userMaster()
    {
        return $this->belongsTo('App\User', 'master_id');
    }
   	public function userManager()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }
}
