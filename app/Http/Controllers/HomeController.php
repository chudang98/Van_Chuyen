<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                // return redirect()->to('home\admin');
                return view('admin.home');
                break;
            case 'Khách hàng' :                
                // return redirect()->to('home\customer');
                return view('customer.home');
                break;
            case 'Nhân viên vận chuyển' :
                // return redirect()->to('home\shipper');
                return view('shipper.home');
                break;
            default :
                return redirect()->to('logout');
        }     

    }
}
