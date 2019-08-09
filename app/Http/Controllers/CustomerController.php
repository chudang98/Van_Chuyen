<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Item;
use App\City;
use App\Commune;
use App\District;
use App\User;
use View;
use DB;

class CustomerController extends Controller
{
    public function dsDonHang(){
        $data['bills'] = Bill::where('users_id_kh',auth()->user()->id)->get();
        $data['items'] = Item::all();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('customer.dsDonHang',$data);
    }
    public function donHang($id){
        $data['bills'] = Bill::where('id',$id)->first();
        $data['items'] = Item::all();
//        $data['items'] = Item::where('bills_id',$id);
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('customer.donHang',$data);
    }
    public function huyDonHang($id){
        DB::table('bills')
            ->where('id', $id)
            ->update(['state' => 'Đã hủy', 'reason'=> $_POST['reason']]);
        return redirect(url('/dsDonHang'));
    }
}
