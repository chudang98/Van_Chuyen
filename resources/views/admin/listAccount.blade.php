@extends('admin.layout')

@section('content')
    <?php $id =0; ?>
    <div class="container">
        <div>
            <h2 class="col-md-10">List Accounts</h2>
            <a href="/themTaiKhoan" >
                <p data-placement="top" data-toggle="tooltip" title="chiTiet" >
                    <button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" style="margin-top: 20px;">New Account</button>
                </p>
            </a>
        </div>
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All Accounts</a></li>
            <li><a data-toggle="tab" href="#menu1">Admin</a></li>
            <li><a data-toggle="tab" href="#menu2">Shipper</a></li>
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
                                    <th></th>
                                    <th>State</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th></th>
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
                                                    <td>{{$u->phone}}</td>
                                                    <td>
                                                        @if($u->user_type == 'Quản trị viên')
                                                            <p style="color: #01DF01">{{$u->user_type}}</p>
                                                        @else
                                                            <p style="color: #0404B4">{{$u->user_type}}</p>
                                                        @endif
                                                    </td>
                                                    <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#changeState" >Detail</button></p></a></td>
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
                                    <th></th>
                                    <th>State</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th></th>
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
                                                <td>{{$u->phone}}</td>
                                                <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"  >Detail</button></p></a></td>

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
                                    <th></th>
                                    <th>State</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th></th>
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
                                                <td>{{$u->phone}}</td>
                                                <td><a href="/taiKhoan/{{$u->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"  >Detail</button></p></a></td>

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
@endsection

