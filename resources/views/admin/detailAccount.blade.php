{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}

@extends('admin.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/accountInfor.css')}}">
@endsection
@section('content')
                <div class="panel-heading" style="text-align: center">
                    <div class="panel-title col-md-12">
                        <h3 class="col-md-11"><i class="fa fa-user-circle avatar"></i> </h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <br>
                </div>
                <div class="panel-body" >
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> State: </label>
                        <div class="controls col-md-8 ">
                            @if($user->is_lock == 'No') <p>Hoạt động</p>
                            @else <p>Đóng băng</p>
                            @endif
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> Name: </label>
                        <div class="controls col-md-8 ">
                            {{$user->name}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> E-mail: </label>
                        <div class="controls col-md-8 ">
                            {{$user->email}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> Phone: </label>
                        <div class="controls col-md-8 ">
                            {{$user->phone}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> Birth: </label>
                        <div class="controls col-md-8 ">
                            {{$user->birth}}
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> Address: </label>
                        <div class="controls col-md-8 ">
                            {{$user->address}}
                            -@foreach($communes as $commune)
                                @if($commune->id == $user->communes_id)
                                    {{$commune->name}}
                                    -@foreach($districts as $district)
                                        @if($district->id == $commune->districts_id)
                                            {{$district->name}}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required col-md-12">
                        <label for="id_username" class="control-label col-md-2  requiredField"> Role: </label>
                        <div class="controls col-md-8 ">
                            {{$user->user_type}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls col-md-2 " ></div>
                        <div class="controls col-md-3 " >
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <button class="btn btn-default" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                    Delete Account
                                </button>
                            </p>
                        </div>
                        <div class="controls col-md-3 ">
                            <form action="/changeState/{{$user->id}}" method="POST" style="margin-left: 0px">
                                @csrf
                                @if($user->is_lock == 'No')
                                    <input type="hidden" name="state" value="Đóng băng">
                                    <button class="btn btn-info" type="submit">Đóng băng</button>
                                @else
                                    <input type="hidden" name="state" value="Hoạt động">
                                    <button class="btn btn-info" type="submit">Hoạt động</button>
                                @endif
    
                            </form>
                        </div>
                        <div class="controls col-md-2 " style="padding-left: 5px;">
                            <a href="/dsTaiKhoan"><p data-placement="top" data-toggle="tooltip" title="chiTiet">
                                    <button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >
                                        Back
                                    </button>
                                </p>
                            </a>
                        </div>
    
    
    
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Delete Account</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/xoaTaiKhoan/{{ $user->id }}" method="GET" >
                            @csrf
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>
                                Đây là 1 hành động không thể khôi phục lại được,
                                nếu vẫn muốn tiếp tục vui lòng nhập "accept" vào ô bên dưới:
                            </div>
                            <div class="form-group required">
                                <input required type="text" style="width: 100%" name="confirm"
                                       pattern="[aA]{1}[cC]{2}[eE]{1}[pP]{1}[tT]{1}">
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-sm btn-default" type="submit">confirm</button>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-success" data-dismiss="modal"> Cancel</button>
                                </div>
                            </div>
                        </form>
    
                    </div>
    
                </div>
@endsection


