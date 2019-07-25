<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //

    public function district()
    {
        $this->belongsTo('App\Commune');
    }
    public function user()
    {
        $this->belongsTo('App\User');
    }
    public function communes_id_sender()
    {
        $this->belongsTo('App\Bill', 'communes_id_sender');
    }
    public function communes_id_reciever()
    {
        $this->belongsTo('App\Bill', 'communes_id_reciever');
    }
}
