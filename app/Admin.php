<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    //
    // protected $table = 'users';
    protected $guard = 'admin';

}
