<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    /*public function apartment(){
        return $this->nasMany('App\Apartment');
    }*/
}
