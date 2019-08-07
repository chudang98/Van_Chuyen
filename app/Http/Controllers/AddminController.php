<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commune;
use App\District;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use View;
use DB;


class AddminController extends Controller
{
    public function checkPW($str){
        $data['user']= User::where('id', session('id'))->first();
        if(strlen($str)>=8)
            for($i=0; $i<strlen($str); $i++)
                if($str[$i] >= '0' && $str[$i] <='9') return 0;
        return 1;
    }

    public function dsTaiKhoan(){
        $data['user'] = User::where('id',session('id'))->first();
        $data['users']= User::all();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('admin.listAccount',$data);
    }

    public function changeState($id){
        $data['user']= User::where('id', session('id'))->first();
        $u = User::where('id',$id)->first();
        if($_POST['state']=='Đóng băng') $u->is_lock= 'Yes';
        else $u->is_lock ='No';
        $u->save();
        $data['user'] = User::where('id',session('id'))->first();
        $data['users']= User::all();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return redirect(url('/taiKhoan/'.$id));
    }

    public function taiKhoan($id){
        $data['user'] = User::where('id',$id)->first();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('admin.detailAccount',$data);
    }

    public function xoaTaiKhoan($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect(url('/dsTaiKhoan'));
    }

    public function themTaiKhoan(){
        $data['user']= User::where('id', session('id'))->first();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        $data['dis'] = District::first();
        return View::make('admin.createAccount',$data);
    }
    
    public function saveAccount(){
        $data['user']= User::where('id', session('id'))->first();
        if($_POST['password1']!=$_POST['password2'] || $this->checkPW($_POST['password1']) ==1 ){
            $data['communes'] = Commune::all();
            $data['districts'] = District::all();
            $data['dis'] = District::first();
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['user_type'] = $_POST['user_type'];
            $data['phone'] = $_POST['phone'];
            $data['birth'] = $_POST['birth'];
            $data['commune'] = $_POST['commune'];
            $data['district'] = $_POST['district'];
            $data['address'] = $_POST['address'];
            return View::make('admin.createAccount', $data);
        }
        else{
            DB::table('users')->insert(
                [   'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'user_type' => $_POST['user_type'],
                    'phone' => $_POST['phone'],
                    'birth' => $_POST['birth'],
                    'communes_id' => $_POST['commune'],
                    'address' => $_POST['address'],
                    'password' => bcrypt($_POST['password1']),
                ]
            );
            return redirect(url('/dsTaiKhoan'));
        }
    }
}
