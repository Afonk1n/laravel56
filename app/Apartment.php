<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /*public function room(){
        return $this->belongsTo('App\Room','room_id','id');
    }*/
    public $timestamps = false;
    protected $fillable = [
        'area', 'number', 'storey', 'specification', 'additional', 'sold', 'image',
    ];

    /*public function room(){
        return $this->hasOne('App\room', 'id','room_id');
    }*/
    public function bathroom()
    {
        return $this->belongsTo('App\Bathroom');
    }
    public function District()
    {
        return $this->belongsTo('App\District');
    }
    public function Layout()
    {
        return $this->belongsTo('App\Layout');
    }
    public function Renovation()
    {
        return $this->belongsTo('App\Renovation');
    }
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
    public function Storeynumber()
    {
        return $this->belongsTo('App\Storeynumber');
    }
    public function Street()
    {
        return $this->belongsTo('App\Street');
    }
}
