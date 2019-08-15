@extends($layout)
@section('css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/accountInfor.css')}}">
@endsection

@section('content')
<div class="container">
        <div class="panel-heading col-md-12" style="text-align: center">
            <div class="panel-title col-md-12">
                <h3 class="col-md-11"><i class="fa fa-user-circle avatar" style="font-size: 68px"></i> </h3>
            </div>
        </div>
        <div class="col-md-12">
            <br>
        </div>
        <div class="panel-body">
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-2  requiredField"> Name: </label>
                <div class="controls col-md-8 ">
                    {{auth()->user()->name}}
                </div>
            </div>
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-2   requiredField"> Email: </label>
                <div class="controls col-md-8 ">
                    {{auth()->user()->email}}
                </div>
            </div>
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-2  requiredField"> Phone: </label>
                <div class="controls col-md-8 ">
                    {{auth()->user()->phone}}
                </div>
            </div>
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-2  requiredField"> Birth: </label>
                <div class="controls col-md-8 ">
                    {{auth()->user()->birth}}
                </div>
            </div>
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-2  requiredField"> Address: </label>
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
            <div class="form-group action">
                <div class="aab controls col-md-3 ">

                </div>
                <div class="aab controls col-md-2 ">
                    <a href="/thayDoittTaiKhoan/{{auth()->user()->name}}">
                        <p data-placement="top" data-toggle="tooltip" title="suatt">
                            <button class="btn btn-info" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                Reset information
                            </button></p>
                    </a>

                </div>
                <div class="controls col-md-2 ">
                    <a href="/thayDoiMatKhau/{{auth()->user()->name}}">
                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                            <button class="btn btn-info " data-title="Edit" data-toggle="modal" data-target="#edit" >
                                Reset Password
                            </button>
                        </p>
                    </a>
                </div>
                <div class="controls col-md-2 " style="margin-left: 25px;">
                    <a href="/home">
                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                            <button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >
                                Back
                            </button>
                        </p>
                    </a>
                </div>



            </div>
        </div>
</div>

@endsection
