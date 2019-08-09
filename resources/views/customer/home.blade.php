@extends('customer.menu')

@section('content')
    <div>
        <form method="post" action="{{ route('order.confirm') }}">
            @csrf

            <div class="sender">
                <h2>Sender</h2>
                <div class="address_sender">
                    <h3> Choose address </h3>
                    <select name="district_sender" id="district_sender" class='dynamic'>
                        <option value="">--District--</option>
                        @foreach ($districts as $element)
                            <option value="{{ $element->id }}"> {{ $element->name }}</option>
                        @endforeach
                    </select>
                    <select name="commune_sender" id="commune_sender" style='width: 173px'>
                        <option value="">--Commune--</option>
                    </select>
                </div>
                <input type="text" name="sender-detail-addr" placeholder="Detail Address">
                <input type="text" name="sender-name" placeholder="Sender name">
                <input type="phone" name="sender-phone" placeholder="Phone number of sender">
            </div>        
            
            <div class="receiver">
                <h2>Reciever</h2>
                <div class="address_receiver">
                    <h3> Choose address </h3>
                    <select name="district_receiver" id="district_receiver" class='dynamic'>
                        <option value="">--District--</option>
                        @foreach ($districts as $element)
                            <option value="{{ $element->id }}"> {{ $element->name }}</option>
                        @endforeach
                    </select>
                    <select name="commune_receiver" id="commune_receiver" style='width: 173px'>
                        <option value="">--Commune--</option>
                    </select>
                </div>
                <input type="text" name="receive-detail-addr" placeholder="Detail Address">
                <input type="text" name="reciever-name" placeholder="Reciever name">
                <input type="phone" name="reciever-phone" placeholder="Phone number of reciever">
            </div>
            
            <div class="order">
                <h2>Order information</h2>
                <div class="item-order" value="item1">
                    <p>Name item : 
                        <input type="text" name="item-name[]" placeholder="Name item"></input>
                    </p>
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

            <button class="plus-item" type="button">
                <i class="fa fa-plus"></i>
            </button>

            <div class="option speech">
                <h2>Chọn tốc độ vận chuyển</h2>
                <select class="speech" name="speech" id="">
                    <option value="Bình thường">Bình thường</option>
                    <option value="Nhanh">Nhanh</option>
                    <option value="Siêu tốc">Siêu tốc</option>
                </select>
            </div>

            <div class="option payment">
                <h2>Chọn phương thức thanh toán</h2>
                <select class="payment" name="payment" id="">
                    <option value="COD">COD</option>
                    <option value="Gateway">Gateway</option>
                </select>
            </div>

            <div class="thongke">
                <div class="soluong">
                    <span>Số lượng item</span>
                    <input type="number" value="1" readonly name="countItem">
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
            css();
            $('.plus-item').click(function(){
                appItem();
            });
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
            $('button[name = "done"]').click(function(){
                if(checkInputEmpty() == true){
                    $('form').submit();
                }
            });

            $('.dynamic').change(function(){
                var element =  $(this).siblings("select[name^='commune_']");
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


            // FUNCTION :
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
                var p_name = $('<p>',{ text : 'Name item : ' });
                var input_name = $('<input>',{
                    type : "text",
                    name : "item-name[]",
                    placeholder : "Name item"
                });
                p_name.append(input_name);
                button_minus.append(i);
                div.append(p_name);
                div.append(div_size);
                div.append(div_weight);
                div.append(button_minus);
                $('.order').append(div);
                $('input[name="countItem"').val(item);

            }

            function deleteItem(itemIndex){
                var query = "div[value='" + itemIndex + "']";
                if(item > 1){
                    $(query).remove();
                    item--;
                }
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
        });



    </script>


@endsection
