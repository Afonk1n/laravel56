<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renovation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
