<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'string';
    protected $table = 'cities';
    //ORM
    public function district(){
        $this->hasMany('App\District');
    }
}
