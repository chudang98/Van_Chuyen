<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    //ORM
    public function bill(){
        $this->belongsTo('App\Bill');
    }
}