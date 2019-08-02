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

    <div class="container">
        <h2>Danh Sách Đơn Hàng</h2>
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Tất cả</a></li>
            <li><a data-toggle="tab" href="#menu1">Đang tìm</a></li>
            <li><a data-toggle="tab" href="#menu2">Đã nhận</a></li>
            <li><a data-toggle="tab" href="#menu3">Đang thực hiện</a></li>
            <li><a data-toggle="tab" href="#menu4">Hoàn thành</a></li>
            <li><a data-toggle="tab" href="#menu5">Đã hủy</a></li>
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
                                    <th>Ngày gửi</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>SDT người nhận</th>
                                    <th>Tổng tiền vận chuyển</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{ $dem++}}</td>
                                            <td>{{$bill->start_date}}</td>
                                            <td>{{$bill->name_reciever}}</td>
                                            <td>
                                                {{$bill->address_reciever}}
                                                -@foreach($communes as $commune)
                                                          @if($commune->id == $bill->communes_id_reciever)
                                                              {{$commune->name}}
                                                              -@foreach($districts as $district)
                                                                  @if($district->id == $commune->districts_id)
                                                                      {{$district->name}}
                                                                  @endif
                                                              @endforeach
                                                          @endif
                                                @endforeach
                                            </td>
                                            <td>{{$bill->phone_reciever}}</td>
                                            <td>
                                                <?php $tien=0; ?>
                                                @foreach($items as $item)
                                                    <?php
                                                        if($item->bills_id == $bill->id){
                                                            if($item->weight!=0){
                                                                $tien+=$item->weight*5000;
                                                            }
                                                            else{
                                                                $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                            }
                                                        }
                                                        ?>
                                                @endforeach
                                                {{$tien}}
                                            </td>
                                            <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
                                        </tr>
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
                                    <th>Ngày gửi</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>SDT người nhận</th>
                                    <th>Tổng tiền vận chuyển</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                        <?php $dem=1; ?>
                                        @foreach($bills as $bill)
                                            @if($bill->state=='Chờ xác nhận')
                                                <tr>
                                                    <td>{{ $dem++}}</td>
                                                    <td>{{$bill->start_date}}</td>
                                                    <td>{{$bill->name_reciever}}</td>
                                                    <td>
                                                        {{$bill->address_reciever}}
                                                        -@foreach($communes as $commune)
                                                            @if($commune->id == $bill->communes_id_reciever)
                                                                {{$commune->name}}
                                                                -@foreach($districts as $district)
                                                                    @if($district->id == $commune->districts_id)
                                                                        {{$district->name}}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$bill->phone_reciever}}</td>
                                                    <td>
                                                        <?php $tien=0; ?>
                                                        @foreach($items as $item)
                                                            <?php
                                                            if($item->bills_id == $bill->id){
                                                                if($item->weight!=0){
                                                                    $tien+=$item->weight*5000;
                                                                }
                                                                else{
                                                                    $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                                }
                                                            }
                                                            ?>
                                                        @endforeach
                                                        {{$tien}}
                                                    </td>
                                                        <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
                                                    </div>
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
                                        <th>Ngày gửi</th>
                                        <th>Người nhận</th>
                                        <th>Địa chỉ nhận</th>
                                        <th>SDT người nhận</th>
                                        <th>Tổng tiền vận chuyển</th>
                                        <th>Chi tiết</th>
                                        </thead>
                                        <tbody>
                                        <?php $dem=1; ?>
                                        @foreach($bills as $bill)
                                            @if($bill->state=='Chờ giao hàng')
                                                <tr>
                                                    <td>{{ $dem++}}</td>
                                                    <td>{{$bill->start_date}}</td>
                                                    <td>{{$bill->name_reciever}}</td>
                                                    <td>
                                                        {{$bill->address_reciever}}
                                                        -@foreach($communes as $commune)
                                                            @if($commune->id == $bill->communes_id_reciever)
                                                                {{$commune->name}}
                                                                -@foreach($districts as $district)
                                                                    @if($district->id == $commune->districts_id)
                                                                        {{$district->name}}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$bill->phone_reciever}}</td>
                                                    <td>
                                                        <?php $tien=0; ?>
                                                        @foreach($items as $item)
                                                            <?php
                                                            if($item->bills_id == $bill->id){
                                                                if($item->weight!=0){
                                                                    $tien+=$item->weight*5000;
                                                                }
                                                                else{
                                                                    $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                                }
                                                            }
                                                            ?>
                                                        @endforeach
                                                        {{$tien}}
                                                    </td>
                                                    <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
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
            <div id="menu3" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>STT</th>
                                    <th>Ngày gửi</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>SDT người nhận</th>
                                    <th>Tổng tiền vận chuyển</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Đang giao hàng')
                                            <tr>
                                                <td>{{ $dem++}}</td>
                                                <td>{{$bill->start_date}}</td>
                                                <td>{{$bill->name_reciever}}</td>
                                                <td>
                                                    {{$bill->address_reciever}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_reciever)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$bill->phone_reciever}}</td>
                                                <td>
                                                    <?php $tien=0; ?>
                                                    @foreach($items as $item)
                                                        <?php
                                                        if($item->bills_id == $bill->id){
                                                            if($item->weight!=0){
                                                                $tien+=$item->weight*5000;
                                                            }
                                                            else{
                                                                $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{$tien}}
                                                </td>
                                                <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
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
            <div id="menu4" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>STT</th>
                                    <th>Ngày gửi</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>SDT người nhận</th>
                                    <th>Tổng tiền vận chuyển</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Hoàn thành giao hàng')
                                            <tr>
                                                <td>{{ $dem++}}</td>
                                                <td>{{$bill->start_date}}</td>
                                                <td>{{$bill->name_reciever}}</td>
                                                <td>
                                                    {{$bill->address_reciever}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_reciever)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$bill->phone_reciever}}</td>
                                                <td>
                                                    <?php $tien=0; ?>
                                                    @foreach($items as $item)
                                                        <?php
                                                        if($item->bills_id == $bill->id){
                                                            if($item->weight!=0){
                                                                $tien+=$item->weight*5000;
                                                            }
                                                            else{
                                                                $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{$tien}}
                                                </td>
                                                <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
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
            <div id="menu5" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>STT</th>
                                    <th>Ngày gửi</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>SDT người nhận</th>
                                    <th>Tổng tiền vận chuyển</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Đã hủy')
                                            <tr>
                                                <td>{{ $dem++}}</td>
                                                <td>{{$bill->start_date}}</td>
                                                <td>{{$bill->name_reciever}}</td>
                                                <td>
                                                    {{$bill->address_reciever}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_reciever)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$bill->phone_reciever}}</td>
                                                <td>
                                                    <?php $tien=0; ?>
                                                    @foreach($items as $item)
                                                        <?php
                                                        if($item->bills_id == $bill->id){
                                                            if($item->weight!=0){
                                                                $tien+=$item->weight*5000;
                                                            }
                                                            else{
                                                                $tien+=$item->height*$item->width*$item->depth*3*5000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{$tien}}
                                                </td>
                                                <td><a href="/donHang/{{$bill->id}}"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
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
</body>
</html>