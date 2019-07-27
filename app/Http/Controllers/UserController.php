<?php

namespace App\Http\Controllers;

use App\Commune;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use View;

class UserController extends Controller
{
    public function ttTaiKhoan(){
        $data['user'] = User::where('id',session('id'))->first();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('accountInfor',$data);
    }
    public function thayDoiMatKhau($alert){
        $data['alert']=$alert;
        $data['user'] = User::where('id',session('id'))->first();
        return View::make('changePW',$data);
    }
    public function thayDoittTaiKhoan($alert){
        $data['alert']=$alert;
        $data['user'] = User::where('id',session('id'))->first();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('changeInfor',$data);
    }
    public function DBCommunes($id){
        $communes = Commune::where('districts_id', $id)->get();
        return response()->json($communes, Response::HTTP_OK);
    }
    public function saveInformation(){
        $user = User::where('id',session('id'))->first();
        if(Hash::check($_POST['password1'],$user->password)) {
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->birth = $_POST['birth'];
            $user->address = $_POST['address'];
            $user->communes_id = $_POST['commune'];
            $user->save();
            $data['user'] = User::where('id', session('id'))->first();
            $data['districts'] = District::all();
            $data['communes'] = Commune::all();
            return View::make('accountInfor', $data);
        }
        else{
            return redirect(url('/thayDoittTaiKhoan/saimk'));
        }
    }
    public function savePassword(){
        $user = User::where('id',session('id'))->first();
        if(Hash::check($_POST['password1'],$user->password)) {
            if($_POST['password2'] != $_POST['password3']){
                return redirect(url('/thayDoiMatKhau/passwordNew'));
            }
            else{
                $user->password = bcrypt($_POST['password2']);
                $user->save();
                return redirect(url('/ttTaiKhoan'));
            }
        }
        else{
            return redirect(url('/thayDoiMatKhau/passwordOld'));
        }
    }
}
