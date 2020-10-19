<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /*public function room(){
        return $this->belongsTo('App\Room','room_id','id');
    }*/
    protected $fillable = [
        'area', 'number', 'storey', 'specification', 'additional', 'sold', 'image',
    ];
}
