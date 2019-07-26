<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends User
{
    //
    

    //ORM
    public function bill(){
        $this->hasMany('App\Bill', 'user_id_nvvc');
    }

}
