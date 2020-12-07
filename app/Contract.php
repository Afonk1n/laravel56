<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'transaction', 'servicecost', 'dealdate', 'dealarea',
    ];

    public function Service()
    {
        return $this->belongsTo('App\Service');
    }
    public function Apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
    public function Status()
    {
        return $this->belongsTo('App\Status');
    }

    public function Street()
    {
        return $this->belongsTo('App\Street');
    }
}
