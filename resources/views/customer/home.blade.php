@extends('customer.menu')

@section('content')
    <div>
        <form action=" {{ route('order.confirm') }}" method="post">
            @csrf
            <div class="sender">
                <h2>Sender</h2>
                <input type="text" name="detail-addr" placeholder="Detail Address">
                <input type="text" name="sender-name" placeholder="Sender name">
                <input type="phone" name="sender-phone" placeholder="Phone number of sender">
            </div>        
            
            <div class="receiver">
                <h2>Reciever</h2>
                <input type="text" name="receive-addr" placeholder="Detail Address">
                <input type="text" name="reciever-name" placeholder="Reciever name">
                <input type="phone" name="reciever-phone" placeholder="Phone number of reciever">
            </div>
            
            <div class="order">
                <h2>Order information</h2>
                <button class="plus-item" type="button">
                    <i class="fa fa-plus"></i>
                </button>

                <div class="item-order" value="item1">
                    <p>Name item : 
                        <input type="text" name="item1-name" placeholder="Name item"></input>
                    </p>
                    <div class="size">
                        <input type="number" name="item1-width" placeholder="Width (cm)" oninput="priceItem('item1')">
                        <input type="number" name="item1-height" placeholder="Height (cm)" oninput="priceItem('item1')">
                        <input type="number" name="item1-depth" placeholder="Depth (cm)" oninput="priceItem('item1')">             
                    </div>
                    <div class="weight">
                        <input type="number" name="item1-weight" placeholder="Weight (kg)" oninput="priceItem('item1')">
                    </div>
                    <button class="minus-item" type="button" value="item1" onclick="deleteItem('item1')">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
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
            <div class="price-order">
                <span>Order price : </span>
                <span class="price">0 VND</span>
            </div>
            <button type="submit" name="submit">Thanh toán</button>
        </form>
    </div>
@endsection

{{--  window.location.href = "{{ route('order.confirm') }}";  --}}



@section('script')
    <script>
        var item = 1, count = 1, price = 0, tocdo = 1;
        $(document).ready(function(){
            $('.plus-item').click(function(){
                appItem();
            });

            $('.speech').change(function(){
                var speech = $('.speech option:selected').val();
                var $tocdo;
                if(speech == 'Bình thường')
                    $tocdo = 1;
                if(speech == 'Nhanh')
                    $tocdo = 1.2;
                if(speech == 'Siêu tốc')
                    $tocdo = 1.5;
                price = price*$tocdo/tocdo;
                tocdo = $tocdo;
                $('.price').text(price + " VND");            
            });

            $('button[name = "submit"]').click(function(){
                if(checkInputEmpty() == true){
                    window.location.href = "{{ route('order.confirm') }}";
                };
            });
            
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
                name : 'item' + count + '-weight',
                placeholder : 'Weight (kg)',
                oninput : "priceItem('item" + count + "')",
            });
            var input2 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-width',
                placeholder : 'Width (cm)',
                oninput : "priceItem('item" + count + "')",
            });
            var input3 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-height',
                placeholder : 'Height (cm)',
                oninput : "priceItem('item" + count + "')",

            });
            var input4 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-depth',
                placeholder : 'Depth (cm)',
                oninput : "priceItem('item" + count + "')",
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
                name : "item" + count + "-name",
                placeholder : "Name item"
            });
            p_name.append(input_name);
            button_minus.append(i);
            div.append(p_name);
            div.append(div_size);
            div.append(div_weight);
            div.append(button_minus);
            $('.order').append(div);
        }

        function deleteItem(itemIndex){
            var query = "div[value='" + itemIndex + "']";
            if(item > 1){
                $(query).remove();
                item--;
            }
        }

        function validateNumber(val){
            var isNum = $.isNumeric(val);
            if(isNum == false || val == '')
                return false;
            return true;

        }
        // Tham số là 1 itemn
        function priceItem(item){
            price = 0;
            for(var i = 1; i <= count; i++){
                price += calItem('item' + i);
            }
            price *= tocdo;
            $('.price').text(price + " VND");
        }

        function calItem(item){
            var weight = queryItemValue(item, 'weight'),
            depth = queryItemValue(item, 'depth'), 
            width = queryItemValue(item, 'width'),
            height = queryItemValue(item, 'height');
            var isDone =  validateNumber(weight) && validateNumber(depth) && validateNumber(width) && validateNumber(height);
            var isVolume = (depth > 50) || (width > 50) || (height > 50);
            var Price = 0;
            if(isVolume){
                Price = depth*width*height*12/5;
            }else{
                Price = weight * 10000;
            }
            return Price;
        }
        // Tham số là stt của item + loại kích thước lấy ra
        function queryItemValue(item, typeValue){
            var query = 'input[name="' + item + '-' + typeValue + '"]';
            return $(query).val();
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
            if(kt == 1)
                $('input[type="number"').each(function(){
                    if(validateNumber($(this).val()) == false){
                        kt = 0;
                        alert('Vui lòng nhập đúng định dạng số !');
                        return false;
                    }
                });
            return true;
        }
    </script>


@endsection
