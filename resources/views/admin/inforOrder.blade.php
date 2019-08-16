@extends('admin.layout')

@section('css')
    <style>
        .top-mar{
            margin-top: 20px;
        }
    </style>    
@endsection

@section('content')
    <div class="container text-center">
        <div class="row">
            <h2 class="text-center">
                Thông tin hóa đơn {{ $data['id'] }}
            </h2>
            <div class="form-row top-mar">
                <label class="col-md-3" >Sender name</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $user['name'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" >Sender telephone</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['phone_client'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                    <label class="col-md-3">Sender address</label>
                    <div class="input-group col-md-5">
                        <div class="input-group-addon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <input class="form-control" readonly value="{{ $data['address_client'] }}"/>
                    </div>
                </div>
            <div class="form-row top-mar">
                <label class="col-md-3" >Receiver name</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['name_reciever'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" >Receiver telephone</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['phone_reciever'] }}"/>
                </div>
            </div>

            <div class="form-row top-mar">
                <label class="col-md-3">Recriver address</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['address_reciever'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" >Date order</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['start_date'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3">Price order</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <input id='price' class="form-control" readonly value="{{ $data['total_price'] }} VNĐ"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" >Payment</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['payment'] }}"/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3">Speed</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <input class="form-control" readonly value="{{ $data['speed']}}"/>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <a href="/orders">
                    <button class="btn btn-primary" type="button">
                    Back</button>
                </a>
            </div>
        </div>


    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var price = {{ $data['total_price'] }},
                price_formated = formatNumber(price);
            $('#price').val(price_formated + " VNĐ");
        });

        function formatNumber(num){
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    </script>

@endsection