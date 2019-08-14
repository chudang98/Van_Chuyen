@extends('admin.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/orderAdmin.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <h1>
            <i class="fab fa-slack-hash icon-header"></i>
            Mã hóa đơn : HD{{ $order->id }}
        </h1>
        <div class="row">
            <h2>
                <i class="fas fa-map-marker-alt icon-header"></i>                            
                SENDER
            </h2>
            <div class="sender">
                <div class="row">
                    <div class="form-row">
                        <div class="name_sender col-md-4 form-group">
                            <label for="sender_name">Sender name</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_name" name="" type="text" value="{{ $user->name }}"/>
                                <div class="input-group-addon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="name_sender col-md-4 form-group">
                            <label for="sender_telephone">Sender phone</label>
                            <div class="input-group">
                                <input class="form-control" id="sender_telephone" name="" type="text" value="{{ $order->phone_client }}"/>
                                <div class="input-group-addon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
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
                    <div class="form-group col-md-6">
                        <label for="addressSender">Address detail</label>
                        <input type="text" class="form-control" id="addressSender" name="sender-detail-addr" value="{{ $order->address_reciever }}">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <h2>
                <i class="fas fa-car icon-header"></i>
                RECIEVER
            </h2>
            <div class="row">
                <div class="form-row">
                    <div class="name_sender col-md-4 form-group">
                        <label for="sender_name">Reciever name</label>
                        <div class="input-group">
                            <input class="form-control" id="reciever_name" name="" type="text" value="{{ $order->name_reciever }}"/>
                            <div class="input-group-addon">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="name_sender col-md-4 form-group">
                        <label for="sender_telephone">Sender phone</label>
                        <div class="input-group">
                            <input class="form-control" id="sender_telephone" name="" type="text" value="{{ $order->phone_reciever }}"/>
                            <div class="input-group-addon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="form-group  col-md-3">
                        <label for="districtReceiver">District</label>
                        <select class="form-control dynamic" id="districtReceiver"  name="district_reciever" to="commune_reciever">
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
                    <div class="form-group col-md-6">
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
            <div class="item-list">
                <table class="table">
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
            <button type="button" class="btn btn-primary">Back</button>
            <button type="button" class="btn btn-outline-primary">Confirm order</button>
            <button type="button" class="btn btn-outline-primary">Cancel order</button>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

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

    </script>
@endsection