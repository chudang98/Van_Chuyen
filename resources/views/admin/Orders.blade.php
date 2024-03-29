@extends('admin.layout')
@section('content')
    <div class="container" onload="css()">
        <br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Confirming</a></li>
            <li><a data-toggle="tab" href="#menu1">Confirmed</a></li>
            <li><a data-toggle="tab" href="#menu2">Delivering</a></li>
            <li><a data-toggle="tab" href="#menu3">Completed</a></li>
            <li><a data-toggle="tab" href="#menu4">Cancelled</a></li>
            <li><a data-toggle="tab" href="#menu5">Failed</a></li>
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
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    <th>Speed</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Chờ xác nhận" && $bill->speed == 'Siêu tốc')
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <p style="color: red">Siêu tốc</p>
                                                </td>
                                                <td>
                                                    <a href="/orderDetail/{{ $bill->id }}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Confirm
                                                            </button>
                                                        </p>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Chờ xác nhận" && $bill->speed == 'Nhanh')
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <p style="color: orange">Nhanh</p>

                                                </td>
                                                <td>
                                                    <a href="/orderDetail/{{ $bill->id }}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Confirm
                                                            </button>
                                                        </p>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Chờ xác nhận" && $bill->speed == 'Bình thường')
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <p style="color: yellow">Bình thường</p>
                                                </td>
                                                <td>
                                                    <a href="/orderDetail/{{ $bill->id }}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Confirm
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
            <div id="menu1" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Chờ giao hàng")
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <a href="orderInfor/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="Chi tiết">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Detail
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
            <div id="menu2" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Đang giao hàng")
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <a href="orderInfor/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="Chi tiết">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Detail
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
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Hoàn thành giao hàng")
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <a href="orderInfor/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="Chi tiết">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Detail
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
            <div id="menu4" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Đã hủy" && $bill->users_id_nvvc == null)
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <a href="orderInfor/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Detail
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
            <div id="menu5" class="tab-pane fade">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Sender </th>
                                    <th>Receiver </th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @foreach($bills as $bill)
                                        @if($bill->state == "Đã hủy" && $bill->users_id_nvvc != null)
                                            <tr>
                                                <td>
                                                    @foreach($users as $user)
                                                        @if($user->id == $bill->users_id_kh)
                                                            {{$user->name}}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <br> {{$bill->phone_client}} <br>
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
                                                    {{$bill->name_reciever}} <br>
                                                    {{$bill->phone_reciever}} <br>
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
                                                    <a href="orderInfor/{{$bill->id}}">
                                                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                                Detail
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
        @if(session()->has('status'))
            @if(session()->get('status') == 'confirmed')
                alert('Đã xác nhận hóa đơn. Hóa đơn đã được phân phối cho shipper và đang chờ nhận !');
                @elseif(session()->get('status') == 'cancelOrder')
                    alert('Đã hủy hóa đơn !');
            @endif
        @endif
    </script>
@endsection
