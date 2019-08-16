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
                Thông tin hóa đơn
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
                <label class="col-md-3" >Receiver name</label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
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
                <label class="col-md-3" ></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" ></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" ></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" ></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3" ></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
            <div class="form-row top-mar">
                <label class="col-md-3"></label>
                <div class="input-group col-md-5">
                    <div class="input-group-addon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <input class="form-control" readonly value=""/>
                </div>
            </div>
        </div>

    </div>
@endsection