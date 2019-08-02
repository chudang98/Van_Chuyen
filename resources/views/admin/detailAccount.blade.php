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
            <div class="panel-heading">
                <div class="panel-title"><h3>Tài khoản chi tiết</h3></div>
            </div>
            <div class="panel-body" >
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Trạng thái: </label>
                    <div class="controls col-md-8 ">
                        @if($u->is_lock == 'No') <p>Hoạt động</p>
                        @else <p>Đóng băng</p>
                        @endif
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Họ và tên: </label>
                    <div class="controls col-md-8 ">
                        {{$u->name}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> E-mail: </label>
                    <div class="controls col-md-8 ">
                        {{$u->email}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> SDT: </label>
                    <div class="controls col-md-8 ">
                        {{$u->phone}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Ngày sinh: </label>
                    <div class="controls col-md-8 ">
                        {{$u->birth}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ: </label>
                    <div class="controls col-md-8 ">
                        {{$u->address}}
                        -@foreach($communes as $commune)
                            @if($commune->id == $u->communes_id)
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
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Chức vụ: </label>
                    <div class="controls col-md-8 ">
                        {{$u->user_type}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls col-md-5 ">
                        <a href="#"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#changeState" >Chuyển trạng thái</button></p></a>
                    </div>
                    <div class="controls col-md-3 " style="padding-left: 5px;">
                        <a href="/dsTaiKhoan"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Quay lại</button></p></a>
                    </div>
                    <div class="controls col-md-4 " >
                        <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn btn-primary btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete" >Xóa tài khoản</button></p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changeState" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/changeState/{{$u->id}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label  requiredField">Chọn trạng thái {{$u->id}}<span class="asteriskField">*</span> </label> <br>
                            <input type="radio" name="state" value="Đóng băng" checked>Đóng băng<br>
                            <input type="radio" name="state" value="Hoạt động">Hoạt động<br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">

                            <button class="btn btn-sm btn-danger btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Chuyển</button>

                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Hủy</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Hủy đơn hàng</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Bạn có chắc muốn xóa tài khoản này không?</div>

                </div>
                <div class="modal-footer">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <form action="/xoaTaiKhoan/{{ $u->id }}" method="GET">
                            <button class="btn btn-sm btn-danger btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                        </form>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>

