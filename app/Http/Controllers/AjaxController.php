<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function chooseDistrict(Request $request)
    {
        // $test = $request->district;
        // return $test;
        $id = $request->district;
        $commune = \App\District::where('id', $id)->first()->communes;
        return response()->json($commune);
    }

    public function deleteSession(Request $request)
    {
        $name = $request->name;
        session()->forget($name);
        return response()->json(['done' => 'ok']);
    }
}
