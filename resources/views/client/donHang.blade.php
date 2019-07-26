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
                <div class="panel-title"><h3>Đơn hàng chi tiết</h3></div>
            </div>
            <div class="panel-body" >
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Tên người nhận: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->name_reciever}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ người nhận: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->address_reciever}}
                        -@foreach($communes as $commune)
                            @if($commune->id == $bills->communes_id_reciever)
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
                        {{$bills->phone_reciever}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Địa chỉ người gửi: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->address_client}}
                        -@foreach($communes as $commune)
                            @if($commune->id == $bills->communes_id_sender)
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
                        {{$bills->phone_client}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Hình thức thanh toán: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->payment}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Tốc độ vận chuyển: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->speed}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Trạng thái đơn hàng: </label>
                    <div class="controls col-md-8 ">
                        {{$bills->state}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Tổng Tiền vận chuyển: </label>
                    <div class="controls col-md-8 ">
                        <?php $tien=0; ?>
                        @foreach($items as $item)
                            <?php
                            if($item->bills_id == $bills->id){
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
                    </div>
                </div>
                @if($bills->state=='Chờ xác nhận')
                    <div class="form-group">
                        <div class="aab controls col-md-3 "></div>
                        <div class="controls col-md-4 ">
    {{--                        <input type="button" onclick="/dsDonHang" value="Quay lại" class="btn btn btn-primary">--}}
                            <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Quay lại</button></p></a>
                        </div>
                        <div class="controls col-md-5 ">
                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn btn-primary btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete" >Hủy đơn</button></p>
                        </div>


                    </div>
                @else
                    <div class="form-group">
                        <div class="aab controls col-md-5 "></div>
                        <div class="controls col-md-7 ">
                            {{--                        <input type="button" onclick="/dsDonHang" value="Quay lại" class="btn btn btn-primary">--}}
                            <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Quay lại</button></p></a>
                        </div>

                    </div>

                @endif
            </div>
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

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Bạn có chắc muốn hủy đơn hàng này không?</div>

                </div>
                <div class="modal-footer">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <form action="/huyDonHang/{{ $bills->id }}" method="GET">
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

