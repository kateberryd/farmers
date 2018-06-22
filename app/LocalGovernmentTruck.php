<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalGovernmentTruck extends Model
{
    protected $fillable = ['date', 'time', 'number'];
    
    public function localGovernment() {
        return $this->belongsTo('App\LocalGovernment');
    }
}
