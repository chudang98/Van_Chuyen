<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Commune;
use App\District;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use DB;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // use Notifiable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $position = $request->user()->getPosition();
        switch ($position)
        {
            case 'Quản trị viên' :
                $data['customer'] = \App\User::where('user_type', 'Khách hàng')->count();
                $data['partner'] = \App\User::where('user_type', 'Nhân viên vận chuyển')->count();
                $data['order'] = \App\Bill::where('state', 'Hoàn thành giao hàng')->count();
                return view('admin.home')
                    ->with('data', $data);
                break;
            case 'Khách hàng' :
                $districts = DB::table('districts')->get();
                session()->forget('data');
                return view('customer.home')
                    ->with('districts', $districts);
                break;
            case 'Nhân viên vận chuyển' :
//                return redirect(url('/waitingOrders'));
                $data['users'] = User::all();

                $u = User::where('id', auth()->user()->id)->first();
                $data['bills'] = Bill::where('state','Chờ giao hàng')
                    ->where('communes_id_sender', $u->communes_id)
                    ->get();
                $data['items'] = Item::all();
                $data['communes'] = Commune::all();
                $data['districts'] = District::all();
                return View::make('shipper.waitingOrders',$data);
                break;
            default :
                return redirect()->to('logout');
        }

    }
}
