<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Bill;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use View;
use DB;

class UserController extends Controller
{
    public function checkPW($str){
        if(strlen($str)>=8)
            for($i=0; $i<strlen($str); $i++)
                if($str[$i] >= '0' && $str[$i] <='9') return 0;
        return 1;
    }

    public function ttTaiKhoan(){
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('accountInfor',$data);
    }

    public function thayDoiMatKhau($alert){
        $data['alert']=$alert;
        return View::make('changePW',$data);
    }

    public function thayDoittTaiKhoan(){
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('changeInfor',$data);
    }

    public function DBCommunes($id){
        $communes = Commune::district($id)->get();
        return response()->json($communes, Response::HTTP_OK);
    }

    public function saveInformation(){
        $user= User::where('id', auth()->user()->id)->first();
//        $user = User::get(auth()->user()->id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->birth = $_POST['birth'];
        $user->address = $_POST['address'];
        $user->communes_id = $_POST['commune'];
        $user->save();
//        $user = array('name'=>$_POST['name'], 'email'=>$_POST['email'], 'birth'=>$_POST['birth'],
//            'address'=>$_POST['address'], 'communes_id'=>$_POST['commune']);
//        DB::table('users')->update($user, auth()->user()->id);
        return redirect(url('/ttTaiKhoan'));
    }
    
    public function savePassword(){
        $user= User::where('id', auth()->user()->id)->first();
        if(Hash::check($_POST['password1'],$user->password)) {
            if($_POST['password2'] != $_POST['password3']){
                return redirect(url('/thayDoiMatKhau/passwordNew'));
            }
            else{
                if($this->checkPW($_POST['password2'])== 0){
                    $user->password = bcrypt($_POST['password2']);
                    $user->save();
                    return redirect(url('/ttTaiKhoan'));
                }
                else{
                    return redirect(url('/thayDoiMatKhau/passwordNew'));
                }
            }
        }
        else{
            return redirect(url('/thayDoiMatKhau/passwordOld'));
        }
    }


    
    public function back(){
        return back()->withInput();
    }
}
