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

class ClientController extends Controller
{
    public function dsDonHang(){
        session(['id' => 1]);
        $data['bills'] = Bill::where('users_id_kh',session('id'))->get();
//        $posts= Post::where('id','>=', 1)
//            ->where('title','PHP')
//            ->where('body','like','%avel%')
//            ->orderBy('id','desc')
//            ->take(2)
//            ->get();
//        $data1['bills'] = Bill::all();
        $data['items'] = Item::all();
        $data['districts'] = District::all();
        $data['communes'] = Commune::all();
        return View::make('client.dsDonHang',$data);
    }
    public function donHang($id){
        $data['bills'] = Bill::where('id',$id)->first();
        $data['items'] = Item::all();
//        $data['items'] = Item::where('bills_id',$id);
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('client.donHang',$data);
    }
    public function huyDonHang($id){
        $item = Item::where('bills_id',$id);
        $item->delete();
        DB::table('bills')
            ->where('id', $id)
            ->update(['state' => 'Đã hủy']);
        return redirect(url('/dsDonHang'));
    }
}
