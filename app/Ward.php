<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['name', 'center_id'];

    public function localGovernment() {
        return $this->belongsTo('App\LocalGovernment');
    }
}
