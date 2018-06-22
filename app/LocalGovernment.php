<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalGovernment extends Model
{
    public function wards() {
        return $this->hasMany('App\Ward');
    }
    
    public function localGovernmentTrucks() {
        return $this->hasMany('App\LocalGovernmentTruck');
    }
}
