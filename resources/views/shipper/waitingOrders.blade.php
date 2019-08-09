@extends('shipper/menu')
@section('content')
    <div class="container" onload="css()">
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
                                                <a href="/S_detailOrder/{{$bill->id}}">
                                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                                            Details
                                                        </button>
                                                    </p>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/takeOrder/{{$bill->id}}">
                                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                        <button id="save{{$bill->id}}" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" >
                                                            Take order
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
    </div>
{{--    <div class="modal fade" id="nhan" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>--}}
{{--                    <h4 class="modal-title custom_align" id="Heading">Hủy đơn hàng</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="alert alert-info"><span class="glyphicon glyphicon-warning-sign"></span> Bạn có chắc muốn nhận đơn hàng này không? {{$bill->name_reciever}}</div>--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <div class="col-md-2"></div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <button class="btn btn-default   " type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Hủy bỏ</button>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-1">--}}
{{--                        <form action="/takeOrder/{{ $bill->id }}" method="GET">--}}
{{--                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Đồng ý</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--    </div>--}}
    <script>
        $(document).ready(
            function css() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("item1")[0].style.padding = "3px 8px";
            }
        );


    </script>
@endsection
