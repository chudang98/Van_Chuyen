<!DOCTYPE html>
<html lang="en">
<head>
    {{--    <title>Bootstrap Example</title>--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    {{--    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/dsDonHang.css')}}">--}}
</head>
<body>
<?php $id =0; ?>
<div class="container">
    <div>
        <h2 class="col-md-10">Danh Sách Tài Khoản</h2>
        <a href="/themTaiKhoan" >
            <p data-placement="top" data-toggle="tooltip" title="chiTiet" >
                <button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" style="margin-top: 20px;">Thêm tài khoản</button>
            </p>
        </a>
    </div>
    <br>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Tất cả</a></li>
        <li><a data-toggle="tab" href="#menu1">Quản trị viên</a></li>
        <li><a data-toggle="tab" href="#menu2">Nhân viên vận chuyển</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>STT</th>
                                <th>Trạng thái</th>
                                <th>Họ và tên</th>
                                <th>E-mail</th>
                                <th>SDT</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th>Chi tiết</th>
                                </thead>
                                <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($users as $u)
                                        @if($u->user_type != 'Khách hàng')
                                            <tr>
                                                <td>{{ $dem++}}</td>
                                                <td>
                                                    @if($u->is_lock == 'No') <p>Hoạt động</p>
                                                    @else <p>Đóng băng</p>
                                                    @endif
                                                </td>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->phone}}</td>
                                                <td>{{$u->birth}}</td>
                                                <td>
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
                                                </td>
                                                <td>{{$u->user_type}}</td>
                                                <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#changeState" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>STT</th>
                                <th>Trạng thái</th>
                                <th>Họ và tên</th>
                                <th>E-mail</th>
                                <th>SDT</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th>Chi tiết</th>
                                </thead>
                                <tbody>
                                <?php $dem=1; ?>
                                @foreach($users as $u)
                                    @if($u->user_type == 'Quản trị viên')
                                        <tr>
                                            <td>{{ $dem++}}</td>
                                            <td>
                                                @if($u->is_lock == 'No') <p>Hoạt động</p>
                                                @else <p>Đóng băng</p>
                                                @endif
                                            </td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->phone}}</td>
                                            <td>{{$u->birth}}</td>
                                            <td>
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
                                            </td>
                                            <td>{{$u->user_type}}</td>
                                            <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"  ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>STT</th>
                                <th>Trạng thái</th>
                                <th>Họ và tên</th>
                                <th>E-mail</th>
                                <th>SDT</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th>Chi tiết</th>
                                </thead>
                                <tbody>
                                <?php $dem=1; ?>
                                @foreach($users as $u)
                                    @if($u->user_type == 'Nhân viên vận chuyển')
                                        <tr>
                                            <td>{{ $dem++}}</td>
                                            <td>
                                                @if($u->is_lock == 'No') <p>Hoạt động</p>
                                                @else <p>Đóng băng</p>
                                                @endif
                                            </td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->phone}}</td>
                                            <td>{{$u->birth}}</td>
                                            <td>
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
                                            </td>
                                            <td>{{$u->user_type}}</td>
                                            <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"  ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="modal fade" id="changeState" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <form action="/changeState/{{$u->id}}" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}
{{--                    <div id="div_id_gender" class="form-group required">--}}
{{--                        <label for="id_gender"  class="control-label  requiredField">Chọn trạng thái {{$u->id}}<span class="asteriskField">*</span> </label> <br>--}}
{{--                        <input type="radio" name="state" value="Đóng băng" checked>Đóng băng<br>--}}
{{--                        <input type="radio" name="state" value="Hoạt động">Hoạt động<br>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <div class="col-md-2"></div>--}}
{{--                    <div class="col-md-4">--}}

{{--                            <button class="btn btn-sm btn-danger btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Chuyển</button>--}}

{{--                    </div>--}}
{{--                    <div class="col-md-1">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Hủy</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <!-- /.modal-content -->--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>--}}
{{--                <h4 class="modal-title custom_align" id="Heading">Hủy đơn hàng</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}

{{--                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Bạn có chắc muốn hủy đơn hàng này không?</div>--}}

{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <div class="col-md-2"></div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <form action="#" method="GET">--}}
{{--                        <button class="btn btn-sm btn-danger btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="col-md-1">--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.modal-content -->--}}
{{--    </div>--}}
{{--</div>--}}
</body>
</html>
