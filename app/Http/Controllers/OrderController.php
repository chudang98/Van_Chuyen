<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->session()->all();
        $data = session()->get('data');
        dd($data);
        // $request->session()->put('order', 'save');
        // $data = $request->session()->all();
        // dd($data);

            // return view('customer.home');
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm_order(Request $request){
        $data = $request->all();
        $count = count($data['item-width']);
        $all_price = 0;
        for($i = 0; $i < $count; $i++){
            $price = 0;
            $height = $data['item-height'][$i];
            $weight = $data['item-weight'][$i];
            $width = $data['item-width'][$i];
            $depth = $data['item-depth'][$i];
            $price = 0;
            if($height > 50 || $weight > 50 || $width > 50){
                $price =  ($height * $depth * $width)*12/5;
            }else{
                $price = $weight*10000;
            }
            $all_price += $price;
        }

        if($data['speech'] == 'Nhanh'){
            $all_price *= 1.2;
        }
        if($data['speech'] == 'Siêu tốc')
            $all_price *= 1.5;

        $data['price'] = $all_price;
        session(['data' => $data]);
        // dd($data);
        return view('customer.confirmOrder')->with('data', $data);
    }
    public function saveOrder(){
        $data = session()->get('data');
        Bill::makeOrderBill($data);
        session()->forget('data');
        session()->put('status', 'done');
        return redirect('/home');
    }
    public function editOrder(){
        $districts = DB::table('districts')->get();
        session()->put('status', 'edit');
        $data = session()->get('data');

        return view('customer.editOrder', 
            [
                'districts' => $districts,
                'data' => $data
            ]);
    }
    public function cancelOrder(){
        
    }
}
