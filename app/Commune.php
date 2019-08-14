<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $communes = [];
    protected $fillable = [
        'id', 'name', 'type', 'districts_id'
    ];

    public function scopeDistrict($query,$id)
    {
        return $query->where('districts_id', $id);
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
