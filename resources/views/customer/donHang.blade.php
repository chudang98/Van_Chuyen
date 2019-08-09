@extends('customer/menu')
@section('content')
<div class="container" onload="css()">
    <div class="panel-heading" style="text-align: center">
        <div ><h3>Detail Order</h3></div>
    </div>
    <div class="panel-body" style="padding-left: 25%" >
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Receiver name: </label>
            <div class="controls col-md-8 ">
                {{$bills->name_reciever}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Address of receiver: </label>
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
            <label for="id_username" class="control-label col-md-4  requiredField"> Phone number of receiver: </label>
            <div class="controls col-md-8 ">
                {{$bills->phone_reciever}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Sender name: </label>
            <div class="controls col-md-8 ">
                {{auth()->user()->name}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Address of sender: </label>
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
            <label for="id_username" class="control-label col-md-4  requiredField"> Phone number of sender: </label>
            <div class="controls col-md-8 ">
                {{$bills->phone_client}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Delivery type: </label>
            <div class="controls col-md-8 ">
                {{$bills->speed}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> State of order: </label>
            <div class="controls col-md-8 ">
                {{$bills->state}}
            </div>
        </div>
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Price: </label>
            <div class="controls col-md-8 ">
                <?php $tien=0; ?>
                @foreach($items as $item)
                    <?php
                    if($item->bills_id == $bills->id){
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
                    if($bills->speed == "Nhanh") $tien= $tien*1.2;
                    else if( $bills->speed ==" Siêu tốc") $tien= $tien *1.5;
                    $tien1 = number_format($tien);
                    ?>
                    {{$tien1}}
            </div>
        </div>
        @if($bills->state=='Chờ xác nhận')
            <div class="form-group">
                <div class="aab controls col-md-2 "></div>
                <div class="controls col-md-3 ">
                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn " data-title="Delete" data-toggle="modal" data-target="#delete" >Cancel</button></p>
                </div>
                <div class="controls col-md-5 ">
{{--                        <input type="button" onclick="/dsDonHang" value="Quay lại" class="btn btn btn-primary">--}}
                    <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
                </div>



            </div>
        @else
            <div class="form-group">
                <div class="aab controls col-md-3 "></div>
                <div class="controls col-md-5 ">
                    {{--                        <input type="button" onclick="/dsDonHang" value="Quay lại" class="btn btn btn-primary">--}}
                    <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
                </div>

            </div>

        @endif
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align " id="Heading">Cancel Order</h4>
                </div>
                <form action="/huyDonHang/{{ $bills->id }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        Reason:
                        <input required type="text" style="width: 100%; height: 50px" name="reason">
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <button class="btn btn-default " type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn  btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>

<script>
    $(document).ready(
        function css() {
            document.getElementsByClassName("item2")[0].style.border = "2px solid #FE642E";
            document.getElementsByClassName("item2")[0].style.padding = "3px 8px";
            // console.log(1)
        }
    );


</script>
@endsection
