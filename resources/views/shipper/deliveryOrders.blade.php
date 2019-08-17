@extends('shipper/menu')
@section('content')
    <div class="container" onload="css()">
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
            <li><a data-toggle="tab" href="#menu1">Delivering</a></li>
            <li><a data-toggle="tab" href="#menu2">Completed</a></li>
            <li><a data-toggle="tab" href="#menu3">Failed</a></li>
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
                                    <th>Sender address</th>
                                    <th>Receiver address</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>
                                                {{$bill->address_client}}
                                                -@foreach($communes as $commune)
                                                    @if($commune->id == $bill->communes_id_sender)
                                                        {{$commune->name}}
                                                        -@foreach($districts as $district)
                                                            @if($district->id == $commune->districts_id)
                                                                {{$district->name}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
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
                                            <td>
                                                @if($bill->state =='Đang giao hàng')
                                                    <p style="color: #C8FE2E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Hoàn thành giao hàng')
                                                    <p style="color: #64FE2E">{{$bill->state}}</p>
                                                @elseif($bill->state =='Đã hủy')
                                                    <p style="color: #424242">{{$bill->state}}</p>
                                                @endif
                                            </td>
                                            <td>
                                                {{number_format($bill->total_price)}}
                                            </td>
                                            <td>
                                                <a href="/S_detailOrder/{{$bill->id}}">
                                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                            Details
                                                        </button>
                                                    </p>
                                                </a>
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
                                    <th>Sender address</th>
                                    <th>Receiver address</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Đang giao hàng")
                                            <tr>
                                                <td>
                                                    {{$bill->address_client}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_sender)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
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
                                                <td>
                                                    {{number_format($bill->total_price)}}
                                                </td>
                                                <td>
                                                    <a href="/S_detailOrder/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Details
                                                            </button>
                                                        </p>
                                                    </a>
                                                </td>
                                                <td>
                                                <td>
                                                    @if($bill->state == "Đang giao hàng")
                                                        <a href="#"  class="actionTake">
                                                            <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                                <button id="save{{$bill->id}}" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#complete{{$bill->id}}" >
                                                                    Complete
                                                                </button>
                                                            </p>
                                                        </a>
                                                    @endif
                                                    <div class="modal fade" id="take{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <form action="/takeOrder/{{$bill->id}}">
                                                                        <button type="submit" class="close" >
                                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true">
                                                                        </span>
                                                                        </button>
                                                                    </form>
                                                                    <h3 class="modal-title custom_align" id="Heading" style="text-align: center">Congratulation</h3>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="alert alert-info">
                                                                        <p>You has just successfully received the request {{$bill->id}}.</p>
                                                                        <p>Please take the package and update the status for this request in real time.</p>
                                                                        <!--                                                                    --><?php
                                                                        //                                                                        header("Refresh:3; url=/takeOrder/$bill->id");
                                                                        //                                                                    ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="complete{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                    <h3 class="modal-title custom_align" id="Heading" style="text-align: center">Complete the order</h3>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="alert alert-info">
                                                                        <p>Press OK if you meet these two oriterio before you complete the order.</p>
                                                                        <p>- Payment</p>
                                                                        <p>- Receiver's signature in the invoice.</p>
                                                                    </div>
                                                                    <div class="modal-footer " style="text-align: center">
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-4">
                                                                            <button type="button" class="btn btn" aria-hidden="true" data-dismiss="modal" >Cancel</button>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button class="btn btn-success " data-title="Delete" data-toggle="modal" data-dismiss="modal" data-target="#notice{{$bill->id}}"
                                                                                    onclick="saveComplete({{$bill->id}})">
                                                                                OK
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="notice{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                                    <h3 class="modal-title custom_align" id="Heading" style="text-align: center">You have just completed delivering
                                                                        the order {{$bill->id}}</h3>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="alert alert-danger">
                                                                        <p>Please submit the payment and the invoice back to the nearest company's office in at least
                                                                            3 days after completing the order</p>
                                                                    </div>
                                                                    <div class="modal-footer " style="text-align: center">
                                                                        <form action="/deliveryOrders" class="cancel-order">
                                                                            <button type="submit" class="btn btn-success" >Yes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                    <th>Sender address</th>
                                    <th>Receiver address</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Hoàn thành giao hàng")
                                            <tr>
                                                <td>
                                                    {{$bill->address_client}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_sender)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
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
                                                <td>
                                                    {{number_format($bill->total_price)}}
                                                </td>
                                                <td>
                                                    <a href="/S_detailOrder/{{$bill->id}}">
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
                                    <th>Sender address</th>
                                    <th>Receiver address</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Đã hủy")
                                            <tr>
                                                <td>
                                                    {{$bill->address_client}}
                                                    -@foreach($communes as $commune)
                                                        @if($commune->id == $bill->communes_id_sender)
                                                            {{$commune->name}}
                                                            -@foreach($districts as $district)
                                                                @if($district->id == $commune->districts_id)
                                                                    {{$district->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
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
                                                <td>
                                                    {{number_format($bill->total_price)}}
                                                </td>
                                                <td>
                                                    <a href="/S_detailOrder/{{$bill->id}}">
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
        </div>
    </div>
    <script>
        $(document).ready(function(){
            document.getElementsByClassName("item2")[0].style.border = "2px solid #FE642E";
            document.getElementsByClassName("item2")[0].style.padding = "3px 8px";
        });
        function saveComplete(obj) {
            $.ajax({
                url:'/completeOrder/'+obj,
                type:'get',

            });
        }
    </script>
@endsection
