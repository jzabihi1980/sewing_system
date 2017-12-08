<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = [
       'firm', 'mark', 'body', 'year_of_issue', 'scheme', 'having_curves', 'comment'
    ];
}
