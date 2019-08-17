@extends('shipper/menu')
@section('content')
    <div class="container" >
        <?php $save =0; ?>
                <div class="panel-heading" style="text-align: center">
                    <div class="panel-title"><h3>Detail Order</h3></div>
                </div>
                <div class="panel-body"  style="margin-left: 25%">
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> Receiver: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->name_reciever}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> Address of Receiver: </label>
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
                        <label for="id_username" class="control-label col-md-3  requiredField"> phone of receiver: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->phone_reciever}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> Sender: </label>
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
                        <label for="id_username" class="control-label col-md-3  requiredField"> Address of sender: </label>
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
                        <label for="id_username" class="control-label col-md-3  requiredField"> phone of sender: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->phone_client}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> Speed: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->speed}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> State: </label>
                        <div class="controls col-md-8 ">
                            {{$bill->state}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-3  requiredField"> Price: </label>
                        <div class="controls col-md-8 ">
                            {{number_format($bill->total_price)}}
                        </div>
                    </div>
                    @if($bill->reason != null)
                        <div id="div_id_username" class="form-group required col-md-12">
                            <label for="id_username" class="control-label col-md-3  requiredField"> Reason: </label>
                            <div class="controls col-md-8 ">
                                {{$bill->reason}}
                            </div>
                        </div>
                    @endif
                    @if($bill->state== "Chờ giao hàng")
                        <div class="form-group" onload="css()">
                            <div class="aab controls col-md-2 "></div>
                            <div class="controls col-md-3 ">
                                <a href="/waitingOrders">
                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                        <button class="btn btn-info " data-title="Edit" data-toggle="modal"  >
                                            Back
                                        </button>
                                    </p>
                                </a>
                            </div>
                            <div class="controls col-md-4 ">
                                <a href="#">
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-primary " data-title="Delete" data-toggle="modal" data-target="#take{{$bill->id}}" onclick="save({{$bill->id}})">
                                            Take
                                        </button>
                                    </p>
                                </a>
                            </div>

                        </div>
                    @elseif($bill->state=="Đang giao hàng")
                        <div class="form-group" onload="css()">
                            <div class="aab controls col-md-1 "></div>
                            <div class="controls col-md-3 ">
                                <a href="#">
                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                        <button class="btn " data-title="Edit" data-toggle="modal" data-target="#confirm{{$bill->id}}" >
                                            Fail
                                        </button>
                                    </p>
                                </a>
                            </div>
                            <div class="controls col-md-3 ">
                                <a href="#">
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-primary " data-title="Delete" data-toggle="modal"  data-target="#complete{{$bill->id}}">
                                            Complete
                                        </button>
                                    </p>
                                </a>
                            </div>
                            <div class="controls col-md-2 ">
                                <a href="/deliveryOrders">
                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                        <button class="btn btn-info " data-title="Edit" data-toggle="modal"  >
                                            Back
                                        </button>
                                    </p>
                                </a>
                            </div>
                        </div>

                    @elseif($bill->state =="Hoàn thành giao hàng" || $bill->state=="Đã hủy")
                        <div class="form-group">
                            <div class="aab controls col-md-3 "></div>
                            <div class="controls col-md-3 ">
                                <a href="/deliveryOrders">
                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                        <button class="btn btn-info " data-title="Edit" data-toggle="modal"  >
                                            Back
                                        </button>
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            <div class="modal fade" id="take{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title custom_align" id="Heading" style="text-align: center">Congratulation</h3>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-info">
                                <p>You has just successfully received the request {{$bill->id}}.</p>
                                <p>Please take the package and update the status for this request in real time.</p>


                            </div>
                            <div class="modal-footer " style="text-align: center">
                                <form action="/S_detailOrder/{{$bill->id}}">
                                    <button type="submit" class="btn btn-success" >OK</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <button type="button" class="btn btn-success" aria-hidden="true" data-dismiss="modal" >No</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn " data-title="Delete" data-toggle="modal" data-dismiss="modal" data-target="#fail{{$bill->id}}">
                                    Yes
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            <div class="modal fade" id="fail{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title custom_align" id="Heading" style="text-align: center">Your reason of failing</h3>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-info">
                                <form action="/failOrder/{{ $bill->id }}" method="post" class="cancel-order">
                                    @csrf
                                    <input type="radio" name="reason"
                                           value="I cannot take the package from the sender" checked> I cannot take the package from the sender<br>
                                    <input type="radio" name="reason"
                                           value="I cannot contact to the receiver"> I cannot contact to the receiver<br>
                                    <input type="radio" name="reason"
                                           value="The receiver refused to receive the package"> The receiver refused to receive the package <br>
                                    <input type="radio" name="reason"
                                           value="I broke/lost the pagkage"> I broke/lost the pagkage <br>
                                    <input type="radio" name="reason"
                                           value="Others"> Others<br>
                                    <input type="text" name="others">
                                    <div class="modal-footer " style="text-align: center">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success" aria-hidden="true" data-dismiss="modal" >Cancel</button>
                                        </div>
                                        <div class="col-md-3">
                                                <button type="submit" class="btn " >OK</button>
                                        </div>

                                    </div>
                                </form>
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
                                <form action="/S_detailOrder/{{$bill->id}}" class="cancel-order">
                                    <button type="submit" class="btn btn-success" >Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @section('script')
        @if($bill->state== "Chờ giao hàng")
            <script>
                $(document).ready(
                    css()
                );
                function css() {
                    document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                    document.getElementsByClassName("item1")[0].style.padding = "3px 8px";
                    console.log(1)
                }
                function save(obj) {
                    $.ajax({
                        url:'/takeOrder/'+obj,
                        type:'get',

                    });
                }


            </script>
        @else
            <script>
                $(document).ready(
                    css()
                );
                function css() {
                    document.getElementsByClassName("item2")[0].style.border = "2px solid #FE642E";
                    document.getElementsByClassName("item2")[0].style.padding = "3px 8px";
                    console.log(1)
                }
                function saveComplete(obj) {
                    $.ajax({
                        url:'/completeOrder/'+obj,
                        type:'get',

                    });
                }
            </script>
        @endif
    @endsection
@endsection
