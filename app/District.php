<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function apartments(){
        return $this->nasMany('App\Apartment');
    }
}
