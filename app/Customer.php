<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    //
    // protected $table = "";
    

    //ORM
    public function bill(){
        $this->hasMany('App\Bill');
    }

}
