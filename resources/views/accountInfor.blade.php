{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading col-md-12">
                <div class="panel-title col-md-12">
                    <h3 class="col-md-11">Thông tin tài khoản</h3>
                    <div class="col-md-1 ">
                        <a href="/thayDoittTaiKhoan/{{$user->name}}"><p data-placement="top" data-toggle="tooltip" title="suatt"><button class="btn btn-danger" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <br>
            </div>
            <div class="panel-body" >
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Họ và tên: </label>
                    <div class="controls col-md-8 ">
                        {{$user->name}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Email: </label>
                    <div class="controls col-md-8 ">
                        {{$user->email}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> SDT: </label>
                    <div class="controls col-md-8 ">
                        {{$user->phone}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Sinh ngày: </label>
                    <div class="controls col-md-8 ">
                        {{$user->birth}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ: </label>
                    <div class="controls col-md-8 ">
                        {{$user->address}}
                        -@foreach($communes as $commune)
                            @if($commune->id == $user->communes_id)
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
                <div class="form-group">
                    <div class="aab controls col-md-2 "></div>
                    <div class="controls col-md-4 ">
                        <a href="#"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Quay lại</button></p></a>
                    </div>
                    <div class="controls col-md-6 ">
                        <a href="/thayDoiMatKhau/{{$user->name}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Đổi mật khẩu</button></p></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

