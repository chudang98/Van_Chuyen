<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Tạo mới tài khoản cho nhân viên</div>
            </div>
            <div class="panel-body" >
                <form  action="/saveAccount" class="form-horizontal" method="post" >
                    @csrf
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField">
                            Họ và tên
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md  textinput textInput form-control" id="id_username" maxlength="30"
                                   name="name" placeholder="Choose your name" style="margin-bottom: 10px" type="text"
                                    @if (isset($name)) value="{{$name}}" @endif
                            />
                        </div>
                    </div>
                    <div id="div_id_email" class="form-group required">
                        <label for="id_email" class="control-label col-md-4  requiredField">
                            E-mail
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md emailinput form-control" id="id_email" name="email"
                                   placeholder="Your current email address" style="margin-bottom: 10px" type="email"
                                   @if (isset($email)) value="{{$email}}" @endif/>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            SDT
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_name" name="phone"
                                   placeholder="Your phone" style="margin-bottom: 10px" type="text" @if (isset($phone)) value="{{$phone}}" @endif/>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required">
                        <label for="id_email" class="control-label col-md-4  requiredField">
                            Ngày sinh
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md emailinput form-control" id="id_email" name="birth"
                                   placeholder="Your current email address" style="margin-bottom: 10px" type="date"
                                   @if (isset($birth)) value="{{$birth}}" @endif/>
                        </div>
                    </div>

                    <div id="div_id_name" class="form-group required" >
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            Quận/Huyện
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-5 " style="margin-bottom: 10px">
                            <select class="selectpicker form-control" name="district" onchange="Changed(this)">

                                @foreach($districts as $dist)
                                    @if (isset($district))
                                        @if($dist->id == $district) <option value={{$dist->id}} selected> {{$dist->name}} </option>
                                        @endif
                                    @endif
                                    <option value={{$dist->id}} > {{$dist->name}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required" >
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            Phường/Xã
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-5 " style="margin-bottom: 10px">
                            <select class="selectpicker form-control" name="commune" id="communes" onchange="change(this)" >
                                onchange="Changed(this)"
                                @if (isset($commune))
                                    @foreach($communes as $com)
                                        @if($com->id == $commune) <option value={{$com->id}} selected > {{$com->name}} </option>
                                        @elseif($com->districts_id == $district)
                                            <option value={{$com->id}} > {{$com->name}} </option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($communes as $com)
                                        @if($com->districts_id == $dis->id)
                                            <option value={{$com->id}} > {{$com->name}} </option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div id="div_id_location" class="form-group required">
                        <label for="id_location" class="control-label col-md-4  requiredField">
                            Số nhà
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_location" name="address"
                                   placeholder="Your location" style="margin-bottom: 10px" type="text" @if (isset($address)) value="{{$address}}" @endif/>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required" >
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            Chức vụ
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-5 " style="margin-bottom: 10px">
                            <select class="selectpicker form-control" name="user_type" >
                                <option value="Quản trị viên" > Quản trị viên </option>
                                <option value="Nhân viên vận chuyển" > Nhân viên vận chuyển </option>
                            </select>
                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            Mật khẩu
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password1"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            Nhập lại mật khẩu
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password2"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                        </div>
                    </div>
                    @if(isset($name))
                        <div class="alert alert-danger" role="alert">
                            Note :<br>
                            - Mật khẩu phải có ít nhất 8 kí tự,ít nhất 1 kí tự số <br>
                            - Mật khẩu nhập lại cần giống với mật khẩu thay thế
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-2 ">
                            <input onclick="window.location.href='/dsTaiKhoan'" type="button" name="Signup" value="Hủy bỏ"
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
<script>
    function Changed(obj) {
        var selectElement = document.getElementById("communes");

        while (selectElement.length > 0) {
            selectElement.remove(0);
        }
        var value = obj.value;
        console.log(value);
        let url = "/DBCommunes/"+value;
        fetch(url)
            .then((resp) => resp.json()) // Transform the data into json
            .then(function(response) {
                console.log(response);
                var x = document.getElementById("communes");
                response.forEach(function (item) {
                    var option = document.createElement("option");
                    // console.log(item);
                    option.text= item.name;
                    option.value= item.id;
                    x.add(option);
                });

            })
    }
</script>
