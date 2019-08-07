@extends('customer/menu')
@section('content')
<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading col-md-12">
                <div class="panel-title col-md-12">
                    <h3 class="col-md-11">Thay đổi mật khẩu</h3>
                    <div class="col-md-1 ">
                        <a href="/thayDoittTaiKhoan/{{auth()->user()->name}}"><p data-placement="top" data-toggle="tooltip" title="suatt"><button class="btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <br>
            </div>
            <div class="panel-body" >
                <form  action="/savePassword" class="form-horizontal" method="post" >
                    @csrf
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            Mật khẩu
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password1"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            @if($alert == 'passwordOld')
                                <div class="alert alert-danger" role="alert">
                                    Mật khẩu không khớp, vui lòng nhập lại!
                                </div>
                            @endif
                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            Mật khẩu mới
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password2"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />

                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            Nhập lại mật khẩu mới
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password3"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            @if($alert == 'passwordNew')
                                <div class="alert alert-danger" role="alert">
                                    Note :<br>
                                    - Mật khẩu phải có ít nhất 8 kí tự,ít nhất 1 kí tự số <br>
                                    - Mật khẩu nhập lại cần giống với mật khẩu thay thế
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-2 ">
                            <input onclick="window.location.href='/ttTaiKhoan'" type="button" name="Signup" value="Hủy bỏ"
                                   class="btn btn btn-primary" id="button-id-signup" />
                        </div>
                        <div class="controls col-md-6 ">
                            <input type="submit" name="Signup" value="Xác nhận" class="btn btn-primary btn btn-info"
                                   id="submit-id-signup" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
