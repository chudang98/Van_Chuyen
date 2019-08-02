<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    //
    // protected $table = "";
    
    protected $guard = 'customer';

    //ORM
    public function bill(){
        $this->hasMany('App\Bill');
    }

}
