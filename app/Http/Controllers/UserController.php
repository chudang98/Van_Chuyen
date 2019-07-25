<?php

namespace App\Http\Controllers;

use App\Commune;
use App\District;
use Illuminate\Http\Request;
use App\User;
use View;

class UserController extends Controller
{
    public function ttTaiKhoan(){
        $data['user'] = User::where('id',session('id'))->first();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('accountInfor',$data);
    }
    public function thayDoiMatKhau(){
        $data['user'] = User::where('id',session('id'))->first();
        return View::make('changePW',$data);
    }
    public function thayDoittTaiKhoan(){
        $data['user'] = User::where('id',session('id'))->first();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('changeInfor',$data);
    }
}
