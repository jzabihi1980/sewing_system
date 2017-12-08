<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'fio', 'auto_id', 'phone', 'data', 'comment'
    ];
    public function auto()
    {
        return $this->belongsTo('App\Model\Auto');
    }
}
