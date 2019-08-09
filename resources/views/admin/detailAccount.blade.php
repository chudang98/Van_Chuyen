{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h3>Detail Account</h3></div>
            </div>
            <div class="panel-body" >
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> State: </label>
                    <div class="controls col-md-8 ">
                        @if($user->is_lock == 'No') <p>Hoạt động</p>
                        @else <p>Đóng băng</p>
                        @endif
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Name: </label>
                    <div class="controls col-md-8 ">
                        {{$user->name}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> E-mail: </label>
                    <div class="controls col-md-8 ">
                        {{$user->email}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Phone: </label>
                    <div class="controls col-md-8 ">
                        {{$user->phone}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Birth: </label>
                    <div class="controls col-md-8 ">
                        {{$user->birth}}
                    </div>
                </div>
                <div id="div_id_username" class="form-group required col-md-12">
                    <label for="id_username" class="control-label col-md-4  requiredField"> Address: </label>
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
                    <label for="id_username" class="control-label col-md-4  requiredField"> Role: </label>
                    <div class="controls col-md-8 ">
                        {{$user->user_type}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls col-md-5 " >
                        <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-default" data-title="Delete" data-toggle="modal" data-target="#delete" >Delete Account</button></p>
                    </div>
                    <div class="controls col-md-5 ">
                        <form action="/changeState/{{$user->id}}" method="POST">
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
                    <div class="controls col-md-1 " style="padding-left: 5px;">
                        <a href="/dsTaiKhoan"><p data-placement="top" data-toggle="tooltip" title="chiTiet"><button class="btn btn-primary " data-title="Edit" data-toggle="modal" data-target="#edit" >Back</button></p></a>
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
            <!-- /.modal-content -->
        </div>
    </div>
</div>

