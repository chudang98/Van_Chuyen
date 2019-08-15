<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'communes_id', 'password', 'birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Config ORM
    public function commune(){
        $this->hasOne('App\Communes');
    }

    public function getPosition(){
        return $this->user_type;
    }

    // return user by id
    public function scopeGet($query, $id){
        return $query-> where('id', $id);
    }

    public function scopeUpdate($user, $id){
        $u = DB('users')::where('id', $id);
        $u->name = $user->name;
        $u->email = $user->email;
        $u->birth = $user->birth;
        $u->address = $user->address;
        $u->communes_id = $user->commune;
        $u->save();
    }
    public static function countMember($type = ''){
        if($type == ''){
            return User::count();
        }else{
            return User::where($type , '=', $type)->count();
        }
    }
}
