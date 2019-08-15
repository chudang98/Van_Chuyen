@extends('customer.menu')

@section('content')
    <h1>Kiểm tra lại thông tin hóa đơn</h1>
    <div class='container' style="margin-left : 50px">
        <div class="sender">
            <h2>
                <i class="fas fa-map-marker-alt icon-header"></i>                            
                Sender
            </h2>
            <div class="infor">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="sender_name">Sender name</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="sender_name" name="sender-name" type="text" value="{{ $data['sender-name'] }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sender_addr">Detail address</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="sender_addr" name="sender-detail-addr" type="text" value="{{ $data['sender-detail-addr'] }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sender_phone">Phone</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="sender_phone" name="sender-phone" type="text" value="{{ $data['sender-phone'] }}"/>
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
                Receiver
            </h2>
            <div class="infor">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="reciever_name">Sender name</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="reciever_name" name="reciever-name" type="text" value="{{ $data['reciever-name'] }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="reciever_addr">Detail address</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="reciever_addr" name="receive-detail-addr" type="text" value="{{ $data['receive-detail-addr'] }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="reciever_phone">Phone</label>
                        <div class="input-group">
                            <input readonly class="form-control" id="reciever_phone" name="reciever-phone" type="text" value="{{ $data['reciever-phone'] }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>

        <div class="order">
            <h2>
                <i class="fas fa-table icon-header"></i>                
                Thông tin đơn hàng
            </h2>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Width (cm)</th>
                                <th>Height (cm)</th>
                                <th>Depth(cm)</th>
                                <th>Weight (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1 ; $i <= count($data['item-width']); $i++)
                                <tr>
                                    <th>{{ $i }}</th>
                                    <th>{{ $data['item-width'][$i - 1] }}</th>
                                    <th>{{ $data['item-height'][$i - 1] }}</th>
                                    <th>{{ $data['item-depth'][$i - 1] }}</th>
                                    <th>{{ $data['item-weight'][$i - 1] }}</th>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>     
            </div>


            <div class="row">
                <div class="infor">
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="price">Thành tiền : ( đơn vị VNĐ )</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="price" type="text"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="payment">Phương thức thanh toán</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="payment" type="text" value="{{ $data['payment'] }}"/>
                                <div class="input-group-addon">
                                    <i class="far fa-credit-card"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="speech">Tốc độ vận chuyển</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="speech" name="reciever-phone" type="text" value="{{ $data['speech'] }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-truck"></i>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
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
            $('input[id="price"]').val(price);
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