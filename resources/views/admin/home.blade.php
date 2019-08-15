@extends('admin.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/homeAdmin.css')}}">
@endsection

@section('content')
    <div class="container-fluid content-main">
        <div class="row">
            <div class="col-md-2 customer">
                <div class="row">
                    <div class="col-md-5 logo-infor">
                        <i class="fas fa-users icon-logo"></i>
                    </div>
                    <div class="col-md-7">
                        <h3>Customer</h3>
                        <p>31232</p>
                    </div>
                </div>
            </div>

            <div class="col-md-2 partner">
                <div class="row">
                    <div class="col-md-5 logo-infor">
                        <i class="fas fa-people-carry icon-logo"></i>
                    </div>
                    <div class="col-md-7">
                        <h3>Partner</h3>
                        <p>31232</p>
                    </div>
                </div>
            </div>

            <div class="col-md-2 completed">
                <div class="row">
                    <div class="col-md-5 logo-infor">
                        <i class="fas fa-shopping-cart icon-logo"></i>
                    </div>
                    <div class="col-md-7">
                        <h3>Completed</h3>
                        <p>31232</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection