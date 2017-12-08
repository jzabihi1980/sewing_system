<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InteriorAuto extends Model
{
    protected $fillable = [
        'name', 'sid', 'type', 'price'
    ];
}
