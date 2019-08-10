@extends('customer.menu')

@section('content')

    <div class='container' style="margin-left : 200px">
        <div class="sender">
            <h2>Sender</h2>
        </div>
        <div class="receiver">
            <h2>Receiver</h2>
        </div>
        <div class="order">
            <h2>Thông tin đơn hàng</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Item name</th>
                        <th>Width</th>
                        <th>Height</th>
                        <th>Depth</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0 ; $i < count($data['item-width']); $i++)
                        <tr>
                            <th>{{ $data['item-name'][$i] }}</th>
                            <th>{{ $data['item-width'][$i] }}</th>
                            <th>{{ $data['item-height'][$i] }}</th>
                            <th>{{ $data['item-depth'][$i] }}</th>
                            <th>{{ $data['item-weight'][$i] }}</th>
                        </tr>
                    @endfor
                </tbody>
                </table>
        </div>
        
        <div class="price">
            <h4>Thành tiền : 
                <span id="price"></span> VND
            </h4>
        </div>
        <div class="method">
            <button id="thanh_toan" class="btn btn-primary" onclick="thanhtoan()">Thanh toán</button>
            <button id="back" class="btn btn-secondary" onclick="back()">Back</button>
            <button id="cancel" class="btn btn-danger" onclick="cancel()">Cancel</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var price = formatNumber({{ session()->get('data')['price'] }});            
            $('span[id="price"]').text(price);

            $("button[id='back']").on('click', function(){
                $.session.set('chooseConfirm', 'back');
            });

        });
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        function thanhtoan(){
            window.location.href = "/saveOrder";
        }
        function back(){
            window.location.href = '/editOrder';
        }
        function cancel(){
            var r = confirm("Bạn có chắc muốn hủy đơn hàng này chứ ???");
            if(r == true){
                window.location.href = '/home';
            }
        }
    </script>
@endsection