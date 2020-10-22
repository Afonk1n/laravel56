<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'transaction', 'servicecost', 'dealdate', 'dealarea',
    ];
}
