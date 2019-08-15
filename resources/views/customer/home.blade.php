@extends('customer.menu')

@section('content')
    <div>
        <h1>ĐẶT ĐƠN VẬN CHUYỂN</h1>
        <form method="post" action="{{ route('order.confirm') }}">
            @csrf

            <div class="sender">
                <h2>
                    <i class="fas fa-map-marker-alt icon-header"></i>                            
                    Sender
                </h2>
                <div class="sender">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="sender_name">Sender name</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_name" name="sender-name" type="text" value="{{ auth()->user()->name }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="sender_addr">Detail address</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_addr" name="sender-detail-addr" type="text" value="{{ auth()->user()->address }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="sender_phone">Phone</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_phone" name="sender-phone" type="text" value="{{ auth()->user()->phone }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>        
            
            <div class="receiver">
                <h2>
                    <i class="fas fa-car icon-header"></i>
                    Reciever
                </h2>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="sender_name">Reciever name</label>
                        <div class="input-group">
                            <input class="form-control" id="sender_name" name="reciever-name" type="text" value=""/>
                            <div class="input-group-addon">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sender_addr">Detail address</label>
                        <div class="input-group">
                            <input class="form-control" id="sender_addr" name="receive-detail-addr" type="text" value=""/>
                            <div class="input-group-addon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sender_phone">Phone</label>
                        <div class="input-group">
                            <input class="form-control" id="sender_phone" name="reciever-phone" type="text" value=""/>
                            <div class="input-group-addon">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            
            <div class="order">
                <h2>
                    <i class="fas fa-box-open"></i>
                    Order information
                </h2>
                <div class="item-order" value="item1">
                    <p>Item 1</p>
                    <div class="size">
                        <input type="number" name="item-width[]" placeholder="Width (cm)">
                        <input type="number" name="item-height[]" placeholder="Height (cm)">
                        <input type="number" name="item-depth[]" placeholder="Depth (cm)">
                    </div>
                    <div class="weight">
                        <input type="number" name="item-weight[]" placeholder="Weight (kg)">
                    </div>
                    <button class="minus-item" type="button" value="item1" onclick="deleteItem('item1')">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            
            <h4>
                Add item
                <button class="plus-item" type="button">
                    <i class="fa fa-plus"></i>
                </button>
            </h4>
            <div class="row">
                <div class="col-md-3 form-group option speech">
                    <label for="speech">Chọn tốc độ vận chuyển</label>
                    <select class="speech form-control" name="speech" id="speech">
                        <option value="Bình thường">Bình thường</option>
                        <option value="Nhanh">Nhanh</option>
                        <option value="Siêu tốc">Siêu tốc</option>
                    </select>
                </div>
                <div class="col-md-3 form-group option payment">
                    <label for="payment">Chọn phương thức thanh toán</label>
                    <select class="speech form-control" name="payment" id="payment">
                        <option value="COD">COD</option>
                        <option value="Gateway">Gateway</option>
                    </select>
                </div>
                <div class="col-md-3 form-group option speech">
                    <label for="countItem">Số lượng item</label>
                    <input class="form-control" id="countItem" type="number" value="1" readonly name="countItem">
                </div>
            </div>

            <button type="button" name="done">Thanh toán</button>
        </form>
    </div>
@endsection


@section('script')
    <script>
        var item = 1, count = 1;
        $(document).ready(function(){
                // Process status order from user order
                @if(session()->has('status'))
                    @if(session()->get('status') == 'done')
                        alert('Đã đặt đơn hàng thành công !');
                        $.ajaxSetup({
                            headers:
                            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                        });
                        $.ajax({
                            method : 'GET',
                            dataType : 'json',
                            url : "{{ route('ajax.deleteSession') }}",
                            data : {
                                method : 'delete_session',
                                name : 'status',
                            },
                            error : function(){
                                elements.empty();
                            }
                        });
                    @endif
                @endif

                // END PROCESS
            css();
            $('.plus-item').click(function(){
                appItem();
            });

 
            
            $('button[name = "done"]').click(function(){
                if(checkInputEmpty() == true){
                    $('form').submit();
                }
            });

 

            function  css() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("item1")[0].style.padding = "3px 8px";
            }
            // FUNCTION :

        });
        function deleteItem(itemIndex){
            var query = "div[value='" + itemIndex + "']";
            if(item > 1){
                $(query).remove();
                item--;
                var i = 1;
                $('.item-order p').each(function(){
                    $(this).text('Item ' + i);
                    i++;
                });
            }
            $('input[name="countItem"').val(item);
        }
        function appItem(){
            count++;
            item++;
            var i = $('<i>', { class : 'fa fa-minus' });
            var div = $('<div>', {
                class : 'item-order',
                value : 'item' + count,
            });
            var div_size = $('<div>', {
                class : 'size'
            })
            var input1 = $('<input>', {
                type : 'number',
                name : 'item-weight[]',
                placeholder : 'Weight (kg)',
            });
            var input2 = $('<input>', {
                type : 'number',
                name : 'item-width[]',
                placeholder : 'Width (cm)',
            });
            var input3 = $('<input>', {
                type : 'number',
                name : 'item-height[]',
                placeholder : 'Height (cm)',

            });
            var input4 = $('<input>', {
                type : 'number',
                name : 'item-depth[]',
                placeholder : 'Depth (cm)',
            });
            div_size.append(input2);
            div_size.append(input3);
            div_size.append(input4);

            var button_minus = $('<button>', {
                class : 'minus-item',
                type : 'button',
                value : 'item' + count,
                onclick : "deleteItem('item" + count + "')",
            })
            var div_weight = $('<div>', {
                class : 'weight'
            })
            div_weight.append(input1);
            var p_name = $('<p>',{ text : 'Item ' + item });
            button_minus.append(i);
            div.append(p_name);
            div.append(div_size);
            div.append(div_weight);
            div.append(button_minus);
            $('.order').append(div);
            $('input[name="countItem"').val(item);

        }
        function validateNumber(val){
            var isNum = $.isNumeric(val);
            if(isNum == false || val == '')
                return false;
            return true;

        }
        // xử lý không đồng bộ
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
            if(kt == 1)
                return true;
            else
                return false;
        }

    </script>


@endsection

