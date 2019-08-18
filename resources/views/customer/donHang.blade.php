@extends('customer/menu')
@section('content')
<div class="container" onload="css()">
    <div class="panel-heading" style="text-align: center">
        <div ><h3>Detail Order</h3></div>
    </div>
    <div class="panel-body" style="padding-left: 25%" >
        <div id="div_id_username" class="form-group required col-md-12">
            <label for="id_username" class="control-label col-md-4  requiredField"> Date: </label>
            <div class="controls col-md-8 ">
                {{$bills->start_date}}
            </div>
        </div>
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
                {{number_format($bills->total_price)}}
            </div>
        </div>
        @if($bills->reason != null)
            <div id="div_id_username" class="form-group required col-md-12">
                <label for="id_username" class="control-label col-md-4  requiredField"> Reason: </label>
                <div class="controls col-md-8 ">
                    {{$bills->reason}}
                </div>
            </div>
        @endif
        @if($bills->state=='Chờ xác nhận')
            <div class="form-group">
                <div class="aab controls col-md-2 "></div>
                <div class="controls col-md-3 ">
                    <a href="#">
                        <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                            <button class="btn" data-title="Edit" data-toggle="modal" data-target="#confirm{{$bills->id}}" >
                                Cancel
                            </button>
                        </p>
                    </a>
                </div>
                <div class="controls col-md-5 ">
                    <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
                </div>



            </div>
        @else
            <div class="form-group">
                <div class="aab controls col-md-3 "></div>
                <div class="controls col-md-5 ">
                    <a href="/dsDonHang"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
                </div>

            </div>

        @endif
    </div>
    <div class="modal fade" id="confirm{{$bills->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                        <button type="button" class="btn btn-success" aria-hidden="true" data-dismiss="modal" >No</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn " data-title="Delete" data-toggle="modal" data-dismiss="modal" data-target="#delete{{$bills->id}}">
                            Yes
                        </button>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div class="modal fade" id="delete{{$bills->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align " id="Heading">Cancel Order</h4>
                </div>
                <form action="/huyDonHang/{{ $bills->id }}" method="POST" class="cancel-order">
                    @csrf
                    <div class="modal-body">
                        Reason:
                        <input type="text" style="width: 100%; height: 50px" name="reason">
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <button class="btn btn-default " type="submit"><span class="glyphicon glyphicon-ok-sign"></span>Submit</button>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn  btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Back</button>
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
