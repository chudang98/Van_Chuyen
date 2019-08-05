<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'name', 'type', 'districts_id'
    ];

    public function district()
    {
        return $this->belongsTo('App\Commune');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function communes_id_sender()
    {
        return $this->belongsTo('App\Bill', 'communes_id_sender');
    }
    public function communes_id_reciever()
    {
        return $this->belongsTo('App\Bill', 'communes_id_reciever');
    }
}
