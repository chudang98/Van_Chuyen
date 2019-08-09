@extends('shipper/menu')
@section('content')
    <div class="container" onload="css()">
        <?php $save =0; ?>
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title"><h3>Đơn hàng chi tiết</h3></div>
                </div>
                <div class="panel-body" >
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Tên người nhận: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->name_reciever}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ người nhận: </label>
                        <div class="controls col-md-8 ">
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
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> SDT người nhận: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->phone_reciever}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Tên người gửi: </label>
                        <div class="controls col-md-8 ">
                            @foreach($users as $user)
                                @if($user->id == $bill->users_id_kh)
                                    {{$user->name}}
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ người gửi: </label>
                        <div class="controls col-md-8 ">
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
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> SDT người gửi: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->phone_client}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Tốc độ vận chuyển: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->speed}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Trạng thái đơn hàng: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->state}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Tổng Tiền vận chuyển: </label>
                        <div class="controls col-md-8 ">
                            <?php $tien=0; ?>
                            @foreach($items as $item)
                                <?php
                                    if($item->weight!=0){
                                        $tien+=$item->weight*10000;
                                    }
                                    else{
                                        $tien+=(($item->height*$item->width*$item->depth)/5000)*12000;
                                    }
                                ?>
                            @endforeach
                                <?php
                                if($bill->speed == "Nhanh") $tien= $tien*1.2;
                                else if( $bill->speed ==" Siêu tốc") $tien= $tien *1.5;
                                $tien1 = number_format($tien);
                                ?>
                                {{$tien1}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="aab controls col-md-3 "></div>
                        <div class="controls col-md-5 ">
                            <a href="/waitingOrders"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-info " data-title="Edit" data-toggle="modal" data-target="#edit" >Quay lại</button></p></a>
                        </div>
                        <div class="controls col-md-4 ">
                            <a href="/takeOrder/{{$bill->id}}">
                                <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-primary " data-title="Delete" data-toggle="modal">Nhận đơn</button></p>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
{{--        <div class="modal fade" id="nhan" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>--}}
{{--                        <h4 class="modal-title custom_align" id="Heading">Hủy đơn hàng</h4>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}

{{--                        <div class="alert alert-info"><span class="glyphicon glyphicon-warning-sign"></span> Bạn có chắc muốn nhận đơn hàng này không?</div>--}}

{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <div class="col-md-2"></div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <button class="btn btn-default   " type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Hủy bỏ</button>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-1">--}}
{{--                            <form action="/takeOrder/{{ $save }}" method="GET">--}}
{{--                                <button type="submit" class="btn  btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Đồng ý</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.modal-content -->--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <script>
        $(document).ready(
            function css() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("car")[0].style.padding = "13px";
                document.getElementsByClassName("car")[0].style.color = "#FE642E";
                // console.log(1)
            }
        );
        $(document).ready(
            function save() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("car")[0].style.padding = "13px";
                document.getElementsByClassName("car")[0].style.color = "#FE642E";
                // console.log(1)
            }
        );

    </script>
@endsection
