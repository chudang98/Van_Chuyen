@extends('layouts.app')


@section('content')
    <form action="" method="post">
        {{ csrf_field() }}
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
            <div class="item" value="item-1">
                <p>Item 1</p>
                <input type="number" name="item1-leght" placeholder="Lenght (cm)">
                <input type="number" name="item1-width" placeholder="Width (cm)">
                <input type="number" name="item1-heght" placeholder="Height (cm)">
                <button class="minus-item" type="button" value="item1">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="price-order">
            <span>Order price : </span>
            <span>0 VND</span>
        </div>
        <button>Thanh toán</button>
    </form>
@endsection


{{--  window.location.href = "{{ route('intro') }}";  --}}
@section('script')
    <script>
        $(document).ready(function(){
            $('.plus-item').click(function(){
                appItem();
            });
            $('input[type="number"]').on('keypress keydown keyup',function(){
                var isNum = $.isNumeric($(this).val());
                var isEmpty = $(this).val();
                console.log(isNum + " " + isEmpty);
            });
        });


        function appItem(){
            var count = $('.order .item').length;
            count++;
            var i = $('<i>', { class : 'fa fa-minus' });
            var div = $('<div>', { class : 'item', value : 'item-' + count });
            var p = $('<p>', { text : 'Item' + count });
            var input1 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-lenght',
                placeholder : 'Lenght (cm)'
            });
            var input2 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-width',
                placeholder : 'Width (cm)'
            });
            var input3 = $('<input>', {
                type : 'number',
                name : 'item' + count + '-height',
                placeholder : 'Height (cm)'
            });
            var button_minus = $('<button>', {
                class : 'minus-item',
                type : 'button',
                value : 'item' + count,
            })
            button_minus.append(i);
            div.append(p);
            div.append(input1);
            div.append(input2);
            div.append(input3);
            div.append(button_minus);
            $('.order').append(div);
        }

        function validateNumber(){

        }

    </script>


@endsection
