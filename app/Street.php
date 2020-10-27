<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function apartments(){
        return $this->nasMany('App\Apartment');
    }
}
