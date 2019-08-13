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
                                                <a href="#"  class="actionTake">
                                                    <p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                                        <button id="save" class="btn btn-primary btn-xs"
                                                                data-title="Edit" data-toggle="modal" data-target="#take{{$bill->id}}" onclick="save({{$bill->id}})">
                                                            Take order
                                                        </button>
                                                    </p>
                                                </a>
                                                <div class="modal fade" id="take{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
{{--                                                                <form action="/takeOrder/{{$bill->id}}">--}}
{{--                                                                    <button type="submit" class="close" >--}}
{{--                                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true">--}}
{{--                                                                        </span>--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
                                                                <h3 class="modal-title custom_align" id="Heading" style="text-align: center">Congratulation</h3>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="alert alert-info">
                                                                    <p>You has just successfully received the request {{$bill->id}}.</p>
                                                                    <p>Please take the package and update the status for this request in real time.</p>
                                                                </div>
                                                                <div class="modal-footer " style="text-align: center">
                                                                    <form action="/waitingOrders">
                                                                        <button type="submit" class="btn btn-success" >OK</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    <script>
        $(document).ready(
            function css() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("item1")[0].style.padding = "3px 8px";
            }
        );

        function save(obj) {
            $.ajax({
                url:'/takeOrder/'+obj,
                type:'get',

            });
        }
    </script>
@endsection
