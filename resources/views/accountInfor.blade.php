@extends('customer/menu')
@section('content')
<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading col-md-12">
                <div class="panel-title col-md-12">
                    <h3 class="col-md-11">Account Information </h3>
                    <div class="col-md-1 ">
                        <a href="/thayDoittTaiKhoan"><p data-placement="top" data-toggle="tooltip" title="suatt"><button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <br>
            </div>
            <div class="panel-body" >
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Name: </label>
                    <div class="controls col-md-8 ">
                        {{auth()->user()->name}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Email: </label>
                    <div class="controls col-md-8 ">
                        {{auth()->user()->email}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Phone: </label>
                    <div class="controls col-md-8 ">
                        {{auth()->user()->phone}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Birth: </label>
                    <div class="controls col-md-8 ">
                        {{auth()->user()->birth}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Address: </label>
                    <div class="controls col-md-8 ">
                        {{auth()->user()->address}}
                        -@foreach($communes as $commune)
                            @if($commune->id == auth()->user()->communes_id)
                                {{$commune->name}}
                                -@foreach($districts as $district)
                                    @if($district->id == $commune->districts_id)
                                        {{$district->name}}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
<!--                --><?php //echo bcrypt('111'); ?>
                <div class="form-group">
                    <div class="aab controls col-md-2 "></div>
                    <div class="controls col-md-6 ">
                        <a href="/thayDoiMatKhau/{{auth()->user()->name}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-info " data-title="Edit" data-toggle="modal" data-target="#edit" >Change Password</button></p></a>
                    </div>
                    <div class="controls col-md-4 ">
                        <a href="#"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
