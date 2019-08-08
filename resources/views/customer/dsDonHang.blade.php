@extends('customer/menu')
@section('content')
    <div class="container" onload="css()">
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Tất cả</a></li>
            <li><a data-toggle="tab" href="#menu1">Chờ xác nhận</a></li>
            <li><a data-toggle="tab" href="#menu2">Chờ giao hàng</a></li>
            <li><a data-toggle="tab" href="#menu3">Đang giao hàng</a></li>
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
                                    <th>Trạng thái</th>
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
                                            <td>{{$bill->state}}</td>
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
                                                                $tien+=$item->weight*10000;
                                                            }
                                                            else{
                                                                $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                            }
                                                        }
                                                        ?>
                                                @endforeach
                                                    <?php
                                                        if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                        else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                    ?>
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
                                                                    $tien+=$item->weight*10000;
                                                                }
                                                                else{
                                                                    $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                                }
                                                            }
                                                            ?>
                                                        @endforeach
                                                            <?php
                                                                if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                                else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                            ?>
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
                                                                    $tien+=$item->weight*10000;
                                                                }
                                                                else{
                                                                    $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                                }
                                                            }
                                                            ?>
                                                        @endforeach
                                                            <?php
                                                                if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                                else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                            ?>
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
                                                                $tien+=$item->weight*10000;
                                                            }
                                                            else{
                                                                $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                        <?php
                                                            if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                            else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                        ?>
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
                                                                $tien+=$item->weight*10000;
                                                            }
                                                            else{
                                                                $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                        <?php
                                                            if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                            else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                        ?>
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
                                                <td class="price">
                                                    <?php $tien=0; ?>
                                                    @foreach($items as $item)
                                                        <?php
                                                        if($item->bills_id == $bill->id){
                                                            if($item->weight!=0){
                                                                $tien+=$item->weight*10000;
                                                            }
                                                            else{
                                                                $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                                            }
                                                        }
                                                        ?>
                                                    @endforeach
                                                    <?php
                                                    if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                                    else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                                    ?>
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
    <script>
        $(document).ready(function(){
            document.getElementsByClassName("item2")[0].style.border = "2px solid #FE642E";
            document.getElementsByClassName("item2")[0].style.padding = "3px 8px";
            formatNumber();
        });
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    </script>
@endsection
