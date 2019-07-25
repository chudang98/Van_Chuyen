<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $primaryKey = 'string';

    // ORM
    public function commune(){
        $this->hasMany('App\Communes');
    }
    public function city(){
        $this->belongsTo('App\City');
    }
}
