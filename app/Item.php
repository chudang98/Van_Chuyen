<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'id',
        'weight',	
        'height',	
        'width',	
        'depth',	
        'bills_id'
    ];
    public $timestamps = false;
    //ORM
    public function bill(){
        $this->belongsTo('App\Bill');
    }
}
