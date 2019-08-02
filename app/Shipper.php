<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends User
{
    //
    protected $guard = 'shipper';
    

    //ORM
    public function bill(){
        $this->hasMany('App\Bill', 'user_id_nvvc');
    }

}
