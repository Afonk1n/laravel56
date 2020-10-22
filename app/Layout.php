<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
