<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'transaction', 'servicecost', 'dealdate', 'dealarea',
    ];
}
