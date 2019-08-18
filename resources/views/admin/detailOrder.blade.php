@extends('admin.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/orderAdmin.css') }}">
@endsection

@section('content')
    <div class="container-fluid main-content">
        <h1>
            <i class="fab fa-slack-hash icon-header"></i>
            Mã hóa đơn : HD{{ $order->id }}
        </h1>
        <form action="/orderConfirm/{{ $order->id }}" method="GET" id="confirmOrder">
            @csrf
            <div class="row">
                <h2>
                    <i class="fas fa-map-marker-alt icon-header"></i>                            
                    SENDER
                </h2>
                <div class="sender class-infor">
                    <div class="row">
                        <div class="name_sender col-md-3 form-group">
                            <label for="sender_name">Sender name</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_name" name="" type="text" value="{{ $user->name }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="phone_sender col-md-3 form-group">
                            <label for="sender_telephone">Sender phone</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_telephone" name="sender_telephone" type="text" value="{{ $order->phone_client }}"/>
                                <div class="input-group-addon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="districtSender">District</label>
                            <select class="form-control dynamic" id="districtSender" name="district_sender" to="commune_sender">
                                <option value="">--District--</option>
                                @foreach ($districts as $element)
                                    <option value="{{ $element->id }}"> {{ $element->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="communeSender">Sub district</label>
                            <select class="form-control" id="communeSender"  name="commune_sender">
                                <option value="">--Sub district--</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="addressSender">Address detail</label>
                            <input type="text" class="form-control" id="addressSender" name="sender-detail-addr" value="{{ $order->address_client }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h2>
                    <i class="fas fa-car icon-header"></i>
                    RECIEVER
                </h2>
                <div class="reciever class-infor">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="reciever_name">Reciever name</label>
                            <div class="input-group">
                                <input class="form-control" id="reciever_name" name="reciever_name" type="text" value="{{ $order->name_reciever }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="reciever_telephone">Reciever phone</label>
                            <div class="input-group">
                                <input class="form-control" id="reciever_telephone" name="reciever_telephone" type="text" value="{{ $order->phone_reciever }}"/>
                                <div class="input-group-addon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="districtReceiver">District</label>
                            <select class="form-control dynamic" id="districtReceiver" name="district_reciever" to="commune_reciever">
                                <option value="">--District--</option>
                                @foreach ($districts as $element)
                                    <option value="{{ $element->id }}"> {{ $element->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="communeReceiver">Sub district</label>
                            <select class="form-control" id="communeReceiver"  name="commune_reciever">
                                <option value="">--Sub district--</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="addressReceiver">Address detail</label>
                            <input type="text" class="form-control" id="addressReceiver" name="reciever-detail-addr" value="{{ $order->address_reciever }}">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <h2>
                    <i class="fas fa-table icon-header"></i>
                    ITEM
                </h2>
                <div class="item-list class-infor">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Height</th>
                                <th scope="col">Width</th>
                                <th scope="col">Depth</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $item->height }}</td>
                                    <td>{{ $item->width }}</td>
                                    <td>{{ $item->depth }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="price">Thành tiền : ( đơn vị VNĐ )</label>
                    <div class="input-group">
                        <input readonly class="form-control" id="price" type="text"/>
                        <div class="input-group-addon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="payment">Phương thức thanh toán</label>
                    <div class="input-group">
                        <input readonly class="form-control" id="payment" type="text" value="{{ $order->payment }}"/>
                        <div class="input-group-addon">
                            <i class="far fa-credit-card"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="speech">Tốc độ vận chuyển</label>
                    <div class="input-group">
                        <input readonly class="form-control" id="speech" type="text" value="{{ $order->speed }}"/>
                        <div class="input-group-addon">
                            <i class="fas fa-truck"></i>
                        </div>
                    </div>
                </div>          
            </div>

            <div class="row">
                <button type="button" class="btn btn-primary" onclick="back()">Back</button>
                <button type="button" class="btn btn-success" onclick="confirmOrder()">Confirm order</button>
                <button type="button" class="btn btn-danger" onclick="cancelOrder()">Cancel order</button>
            </div>
        </form>

        <form action="/cancelOrder/{{ $order->id }}" hidden name="OrderHidden" method="POST">
            @csrf
            <input type="text" placeholder="Type the reason ?" class="name form-control" name="reasonCancel" value="none"/>
        </form>
    </div>

@endsection


@section('script')
    <script>
        var Price = {{ $order->total_price }}, 
            Speech = '{{ $order->speed }}' ; 
        $(document).ready(function(){
            var price = formatNumber({{ $order->total_price }});
            $('input[id="price"]').val(price);

            $('.dynamic').change(function(){
                var commune =  $(this).attr('to');
                console.log(commune);
                var element = $("select[name='" + commune + "'");
                if($(this).val != ''){
                    var value = $(this).val();
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        method : 'GET',
                        dataType : 'json',
                        url : "{{ route('register.selectDistrict') }}",
                        data : {
                            district : value,
                            _token : _token,
                        },
                        success : function(result){
                            element.empty();
                            $.each(result, function(index){
                                element.append($('<option>', {
                                    value: result[index].id,
                                    text: result[index].name,
                                }));
                            });
                        },
                        error : function(){
                            elements.empty();
                        }
                    });
                }
            });

        });

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        function back(){
            window.location.href = '/orders';
        }

        function confirmOrder(){
            if(checkInputEmpty() == true){
                $('form[id="confirmOrder"]').submit();
            }
        }
        function cancelOrder(){
            $.confirm({
                title: 'Cancel Order ?',
                content: 'Are you sure to cancel this order ?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Cancel order',
                        btnClass: 'btn-red',
                        action: function(){
                            reasonCancel();
                        }
                    },
                    close: function () {
                    }
                }
            });
            function reasonCancel(){
                var form;
                $.confirm({
                    title: 'Reason to cancel the order!',
                    content: '' +
                    '<form action="">' +
                        '@csrf' +
                        '<div class="form-group">' +
                        '<input type="text" placeholder="Type the reason ?" class="name form-control" required  name="reason"/>' +
                        '</div>' +
                    '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Cancel',
                            btnClass: 'btn-red',
                            action : function () {
                                var name = this.$content.find('.name').val();
                                if(name == '')
                                {
                                    $.alert({
                                        title: 'ERROR!',
                                        content: 'Bạn phải nhập lý do mới được phép hủy đơn!',
                                        type : 'red',
                                    });
                                    return false;
                                }else
                                {
                                    $('input[name="reasonCancel"]').val(name);
                                    $('form[name="OrderHidden"]').submit();

                                }
                            }
                        },
                        close: function () {

                        },
                    },
                    onContentReady: function () {
                        // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function (e){
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click'); // reference the button and click it
                        });
                    }
                });
                
            }
        }

        function checkInputEmpty(){
            var kt = 1;
            $('input').each(function(){
                if($(this).val() == ''){
                    kt = 0;
                    alert('Vui lòng điền đầy đủ thông tin !');
                    return false;
                }
            });
            if(kt == 1){
                $('input[type="number"').each(function(){
                    if(validateNumber($(this).val()) == false){
                        kt = 0;
                        alert('Vui lòng nhập đúng định dạng số !');
                        return false;
                    }
                });
            }
            if(kt == 1){
                $('select').each(function(){
                    if($(this).val() == ''){
                        kt = 0;
                        alert('Vui lòng chọn thông tin địa chỉ hóa đơn !');
                        return false;
                    }
                });
            }
            if(kt == 1)
                return true;
            else
                return false;
        }
        function validateNumber(val){
            var isNum = $.isNumeric(val);
            if(isNum == false || val == '')
                return false;
            return true;
        }

    </script>
@endsection