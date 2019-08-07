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

    public function thayDoittTaiKhoan($alert){
        $data['alert']=$alert;
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('changeInfor',$data);
    }

    public function DBCommunes($id){
        $communes = Commune::where('districts_id', $id)->get();
        return response()->json($communes, Response::HTTP_OK);
    }

    public function saveInformation(){
        if(Hash::check($_POST['password1'],$user->password)) {
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->birth = $_POST['birth'];
            $user->address = $_POST['address'];
            $user->communes_id = $_POST['commune'];
            $user->save();
            $data['user'] = User::where('id', auth()->user()->id)->first();
            $data['districts'] = District::all();
            $data['communes'] = Commune::all();
            return View::make('accountInfor', $data);
        }
        else{
            return redirect(url('/thayDoittTaiKhoan/saimk'));
        }
    }
    
    public function savePassword(){
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

    public function confirm_order(Request $request){
        $data = $request->all();
        return view('confirmOrder.blade.php')
                    ->with('data', $data);
    }
}
