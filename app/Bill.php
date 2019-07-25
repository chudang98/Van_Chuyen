<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    //ORM
    public function item(){
        $this->hasMany('App\Item');
    }
    public function communes_id_sender(){
        $this->hasOne('App\Communes');
    }
    public function communes_id_reciever(){
        $this->hasOne('App\Communes');
    }
    public function user_id_kh(){
        $this->belongsTo('App\Customer');
    }
    public function user_id_nvvc(){
        $this->belongsTo('App\Shipper');
    }
}
