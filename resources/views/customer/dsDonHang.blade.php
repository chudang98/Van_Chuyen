@extends('customer/menu')
@section('content')
    <div class="container" onload="css()">
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All orders</a></li>
            <li><a data-toggle="tab" href="#menu1">Waiting for confirm</a></li>
            <li><a data-toggle="tab" href="#menu2">Waiting</a></li>
            <li><a data-toggle="tab" href="#menu3">Delivering</a></li>
            <li><a data-toggle="tab" href="#menu4">Completed</a></li>
            <li><a data-toggle="tab" href="#menu5">Canceled</a></li>
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
                                    <th>Receiver</th>
                                    <th>Address of receiver</th>
                                    <th>phone number of receiver</th>
                                    <th>Price</th>
                                    <th>State</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{ $dem++}}</td>
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
                                                        $tien1 = number_format($tien);
                                                    ?>
                                                    {{$tien1}}
                                            </td>
                                            <td>
                                                @if($bill->state =='Chờ xác nhận')
                                                    <p style="color: #FE642E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Chờ giao hàng')
                                                    <p style="color: #FACC2E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Đang giao hàng')
                                                    <p style="color: #C8FE2E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Hoàn thành giao hàng')
                                                    <p style="color: #64FE2E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Đã hủy')
                                                    <p style="color: #424242">{{$bill->state}}</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/donHang/{{$bill->id}}">
                                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                            Details
                                                        </button>
                                                    </p></a>
                                            </td>
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
                                    <th></th>
                                    <th>Receiver</th>
                                    <th>Address of receiver</th>
                                    <th>phone number of receiver</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $dem=1; ?>
                                        @foreach($bills as $bill)
                                            @if($bill->state=='Chờ xác nhận')
                                                <tr>
                                                    <td>{{ $dem++}}</td>
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
                                                            $tien1 = number_format($tien);
                                                            ?>
                                                            {{$tien1}}
                                                    </td>
                                                    <td>
                                                        <a href="/donHang/{{$bill->id}}">
                                                            <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                    Details
                                                                </button>
                                                            </p></a>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                                <button class="btn btn-xs" data-title="Edit" data-toggle="modal" data-target="#confirm{{$bill->id}}" >
                                                                    Cancel
                                                                </button>
                                                            </p>
                                                        </a>
                                                        <div class="modal fade" id="confirm{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header alert-danger">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                        <h4 class="modal-title custom_align " id="Heading">Cancel Order</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="danger">Bạn có chắc muốn hủy đơn hàng này?</p>
                                                                    </div>
                                                                    <div class="modal-footer " style="text-align: center">
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-4">
                                                                            <button type="button" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" >No</button>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button class="btn btn btn-danger" data-title="Delete" data-toggle="modal" data-dismiss="modal" data-target="#delete{{$bill->id}}">
                                                                                Yes
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="delete{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header alert-danger">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                        <h4 class="modal-title custom_align " id="Heading">Cancel Order</h4>
                                                                    </div>
                                                                    <form action="/huyDonHang/{{ $bill->id }}" method="POST" class="cancel-order">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <input type="radio" name="reason"
                                                                                   value="I cannot contact to the receiver"> Waiting for the confirmation take too long<br>
                                                                            <input type="radio" name="reason"
                                                                                   value="The receiver refused to receive the package"> The order is no longer necessary <br>
                                                                            <input type="radio" name="reason"
                                                                                   value="I broke/lost the pagkage"> The price is unreasonable<br>
                                                                            <input type="radio" name="reason"
                                                                                   value="Others"> Others<br>
                                                                            <input type="text" name="others">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-4">
                                                                                <button class="btn btn-danger " type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Submit</button>
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <button type="button" class="btn  btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Back</button>
                                                                            </div>

                                                                        </div>
                                                                    </form>


                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                        </div>

                                                    </td>
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
                                        <th>Receiver</th>
                                        <th>Address of receiver</th>
                                        <th>phone number of receiver</th>
                                        <th>Price</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        <?php $dem=1; ?>
                                        @foreach($bills as $bill)
                                            @if($bill->state=='Chờ giao hàng')
                                                <tr>
                                                    <td>{{ $dem++}}</td>
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
                                                            $tien1 = number_format($tien);
                                                            ?>
                                                            {{$tien1}}
                                                    </td>
                                                    <td>
                                                        <a href="/donHang/{{$bill->id}}">
                                                            <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                    Details
                                                                </button>
                                                            </p>
                                                        </a>
                                                    </td>
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
                                    <th></th>
                                    <th>Receiver</th>
                                    <th>Address of receiver</th>
                                    <th>phone number of receiver</th>
                                    <th>Price</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Đang giao hàng')
                                            <tr>
                                                <td>{{ $dem++}}</td>
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
                                                        $tien1 = number_format($tien);
                                                        ?>
                                                        {{$tien1}}
                                                </td>
                                                <td>
                                                    <a href="/donHang/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Details
                                                            </button>
                                                        </p></a>
                                                </td>
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
                                    <th></th>
                                    <th>Receiver</th>
                                    <th>Address of receiver</th>
                                    <th>phone number of receiver</th>
                                    <th>Price</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Hoàn thành giao hàng')
                                            <tr>
                                                <td>{{ $dem++}}</td>
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
                                                        $tien1 = number_format($tien);
                                                        ?>
                                                        {{$tien1}}
                                                </td>
                                                <td>
                                                    <a href="/donHang/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Details
                                                            </button>
                                                        </p></a>
                                                </td>
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
                                    <th></th>
                                    <th>Receiver</th>
                                    <th>Address of receiver</th>
                                    <th>phone number of receiver</th>
                                    <th>Price</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <?php $dem=1; ?>
                                    @foreach($bills as $bill)
                                        @if($bill->state=='Đã hủy')
                                            <tr>
                                                <td>{{ $dem++}}</td>
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
                                                    {{number_format($bill->total_price)}}
                                                </td>
                                                <td>
                                                    <a href="/donHang/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Details
                                                            </button>
                                                        </p></a>
                                                </td>
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
        });
    </script>
@endsection
