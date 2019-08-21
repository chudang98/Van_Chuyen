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
        $data['users'] = User::all();

        $u = User::where('id', auth()->user()->id)->first();
        $data['bills'] = Bill::where('state','Chờ giao hàng')
            ->where('communes_id_sender', $u->communes_id)
            ->get();
        $data['items'] = Item::all();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('shipper.waitingOrders',$data);
    }
    public function detailOrder($id){
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
            ->update(['state' => 'Đang giao hàng', 'users_id_nvvc'=>auth()->user()->id]);
//        return redirect(url('/waitingOrders'));
        return 'OK';
    }
    public function completeOrder($id){
        DB::table('bills')
            ->where('id', $id)
            ->update(['state' => 'Hoàn thành giao hàng']);
        return 'OK';
    }
    public function failOrder($id){
        if($_POST['reason'] != 'Others'){
            DB::table('bills')
                ->where('id', $id)
                ->update(['state' => 'Đã hủy', 'reason'=> $_POST['reason']]);
        }
        else{
            DB::table('bills')
                ->where('id', $id)
                ->update(['state' => 'Đã hủy', 'reason'=> $_POST['others']]);
        }
        return redirect(url('/S_detailOrder/'.$id));

    }
    public function DBCommunes($id){
        $communes = Commune::where('districts_id', $id)->get();
        return response()->json($communes, Response::HTTP_OK);
    }

    public function deliveryOrders(){
        $data['users'] = User::all();
        $data['bills'] = Bill::where('users_id_nvvc', auth()->user()->id)
            ->get();
        $data['items'] = Item::all();
        $data['communes'] = Commune::all();
        $data['districts'] = District::all();
        return View::make('shipper.deliveryOrders',$data);
    }
}
