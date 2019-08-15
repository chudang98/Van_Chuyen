<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
                return view('admin.home');
                break;
            case 'Khách hàng' :
                $districts = DB::table('districts')->get();
                session()->forget('data');
                return view('customer.home')
                    ->with('districts', $districts);
                break;
            case 'Nhân viên vận chuyển' :
                return redirect()->to('/waitingOrders');
                break;
            default :
                return redirect()->to('logout');
        }

    }
}
