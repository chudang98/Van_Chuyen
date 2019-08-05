<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'name', 'type', 'cities_id'
    ];


    // ORM
    public function communes(){
        return $this->hasMany(Commune::class, 'districts_id');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }

    public static function getCommunes($id){
        $data = App\District::where('id', $id)->first()->communes;
        return $data;
    }

}
