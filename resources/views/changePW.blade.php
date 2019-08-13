@extends('customer/menu')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/changeInfor.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="panel-heading col-md-12" style="text-align: center">
        <div class="panel-title col-md-12">
            <h3 class="col-md-11"><i class="fa fa-user-circle avatar"></i></h3>

        </div>
    </div>
    <div class="col-md-12">
        <br>
    </div>
    <div class="panel-body">
        <form  action="/savePassword" class="form-horizontal" method="post" >
            @csrf
            <div id="div_id_password1" class="form-group required">
                <label for="id_password1" class="control-label col-md-3  requiredField">
                    Password
                    <span class="asteriskField">*</span>
                </label>
                <div class="controls col-md-4 ">
                    <input required class="input-md textinput textInput form-control" id="id_password1" name="password1"
                           placeholder="password" style="margin-bottom: 10px" type="password" />
                    @if($alert == 'passwordOld')
                        <div class="alert alert-danger" role="alert">
                            Wrong password. Please enter your password again!
                        </div>
                    @endif
                </div>
            </div>
            <div id="div_id_password1" class="form-group required">
                <label for="id_password1" class="control-label col-md-3  requiredField">
                    New password
                    <span class="asteriskField">*</span>
                </label>
                <div class="controls col-md-4 ">
                    <input required class="input-md textinput textInput form-control" id="id_password1" name="password2"
                           placeholder="New password" style="margin-bottom: 10px" type="password" />

                </div>
            </div>
            <div id="div_id_password1" class="form-group required">
                <label for="id_password1" class="control-label col-md-3  requiredField">
                    Confirm new password
                    <span class="asteriskField">*</span>
                </label>
                <div class="controls col-md-4 ">
                    <input required class="input-md textinput textInput form-control" id="id_password1" name="password3"
                           placeholder="Confirm new password" style="margin-bottom: 10px" type="password" />
                    @if($alert == 'passwordNew')
                        <div class="alert alert-danger" role="alert">
                            The password needs at least 8 characters and 1 number.
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group action">
                <div class="aab controls col-md-4 "></div>
                <div class="controls col-md-2 ">
                    <input onclick="window.location.href='/ttTaiKhoan'" type="button" name="Signup" value="Cancel"
                           class="btn btn btn-info" id="button-id-signup" />
                </div>
                <div class="controls col-md-6 ">
                    <input type="submit" name="Signup" value="Confirm" class="btn btn-primary btn"
                           id="submit-id-signup" />
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
