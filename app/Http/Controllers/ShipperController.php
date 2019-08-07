<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Item;
use App\Commune;
use App\District;
use App\User;
use App\Bill;
use View;
use DB;

class ShipperController extends Controller
{
    //
    public function waitingOrders(){
        $data['u']= User::where('id', session('id'))->first();
        $data['users'] = User::all();

        $u = User::where('id', session('id'))->first();
        $data['bills'] = Bill::where('state','Chờ giao hàng')
                        ->where('communes_id_sender', $u->communes_id)
                        ->get();
        $data['items'] = Item::all();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('shipper.waitingOrders',$data);
    }
    public function detailOrder($id){
        $data['u']= User::where('id', session('id'))->first();
        $data['users'] = User::all();

        $data['bill'] = Bill::where('id',$id)->first();
        $bill = Bill::where('id',$id)->first();
        $data['items'] = Item::where('bills_id',$bill->id)->get();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('shipper.detailOrder',$data);
    }
    public function takeOrder($id){
        DB::table('bills')
            ->where('id', $id)
            ->update(['state' => 'Đang giao hàng', 'users_id_nvvc'=>session('id')]);
        return redirect(url('/waitingOrders'));
    }
}
