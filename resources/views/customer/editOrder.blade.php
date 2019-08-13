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
                        <option value="">--Subdistrict--</option>
                    </select>
                </div>
                <input type="text" name="sender-detail-addr" placeholder="Detail Address" value="{{ $data['sender-detail-addr'] }}">
                <input type="text" name="sender-name" placeholder="Sender name" value="{{ $data['sender-name'] }}">
                <input type="phone" name="sender-phone" placeholder="Phone number of sender" value="{{ $data['sender-phone'] }}">
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
                        <option value="">--Subdistrict--</option>
                    </select>
                </div>
                <input type="text" name="receive-detail-addr" placeholder="Detail Address" value="{{ $data['receive-detail-addr'] }}">
                <input type="text" name="reciever-name" placeholder="Reciever name" value="{{ $data['reciever-name'] }}">
                <input type="phone" name="reciever-phone" placeholder="Phone number of reciever" value="{{ $data['reciever-phone'] }}">
            </div>
            
            <div class="order">
                <h2>Order information</h2>
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
        var count =  1,
        item = JSON.parse('{{ count($data["item-name"]) }}');
        $(document).ready(function(){
            // set old value input
            @for($i = 0; $i < count($data['item-name']); $i++)
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
                    value : "{{ $data['item-weight'][$i] }}",
                });
                var input2 = $('<input>', {
                    type : 'number',
                    name : 'item-width[]',
                    placeholder : 'Width (cm)',
                    value : "{{ $data['item-width'][$i] }}",
                });
                var input3 = $('<input>', {
                    type : 'number',
                    name : 'item-height[]',
                    placeholder : 'Height (cm)',
                    value : "{{ $data['item-height'][$i] }}",

                });
                var input4 = $('<input>', {
                    type : 'number',
                    name : 'item-depth[]',
                    placeholder : 'Depth (cm)',
                    value : "{{ $data['item-depth'][$i] }}",
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
                    placeholder : "Name item",
                    value : "{{ $data['item-name'][$i] }}",
                });
                p_name.append(input_name);
                button_minus.append(i);
                div.append(p_name);
                div.append(div_size);
                div.append(div_weight);
                div.append(button_minus);
                $('.order').append(div);
                count++;
            @endfor
            $('input[name="countItem"').val(item);

            css();
            $('.plus-item').click(function(){
                appItem();
            });
            
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

            $('select[name="payment"]').val("{{ $data['payment'] }}");
            $('select[name="speech"]').val("{{ $data['speech'] }}");

            
            var sender = $('select[name="district_sender"]'),
                reciever = $('select[name="district_receiver"]')
                var _token = $("input[name='_token']").val();

            sender.val('{{ $data["district_sender"] }}');
            var commune_sender =  sender.siblings("select[name^='commune_']");

            $.ajax({
                method : 'GET',
                dataType : 'json',
                url : "{{ route('register.selectDistrict') }}",
                data : {
                    district : sender.val(),
                    _token : _token,
                },
                success : function(result){
                    commune_sender.empty();
                    $.each(result, function(index){
                        commune_sender.append($('<option>', {
                            value: result[index].id,
                            text: result[index].name,
                        }));
                    });
                    commune_sender.val('{{ $data["commune_sender"] }}');
                },
                error : function(){
                    elements.empty();
                }
            });

            reciever.val('{{ $data["district_receiver"] }}');
            var commune_recie =  reciever.siblings("select[name^='commune_']");
            $.ajax({
                method : 'GET',
                dataType : 'json',
                url : "{{ route('register.selectDistrict') }}",
                data : {
                    district : reciever.val(),
                    _token : _token,
                },
                success : function(result){
                    commune_recie.empty();
                    $.each(result, function(index){
                        commune_recie.append($('<option>', {
                            value: result[index].id,
                            text: result[index].name,
                        }));
                    });
                    commune_recie.val('{{ $data["commune_receiver"] }}');
                },
                error : function(){
                    elements.empty();
                }
            });

            // FUNCTION :
            function  css() {
                document.getElementsByClassName("item1")[0].style.border = "2px solid #FE642E";
                document.getElementsByClassName("item1")[0].style.padding = "3px 8px";
            }
        });
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
        // --------- xử lý không đồng bộ
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
        function checkStringInput(){
            
        }
    </script>

@endsection
