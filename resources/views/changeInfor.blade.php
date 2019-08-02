<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Thay đổi thông tin tài khoản</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px">
                    <a id="signinlink"href="/thayDoiMatKhau/{{$user->name}}">Đổi mật khẩu</a>
                </div>
            </div>
            <div class="panel-body" >
                <form  action="/saveInformation" class="form-horizontal" method="post" >
                    @csrf
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField">
                            Họ và tên
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md  textinput textInput form-control" id="id_username" maxlength="30"
                                   name="name" placeholder="Choose your name" style="margin-bottom: 10px" type="text"
                                   value={{$user->name}} />
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
                                   value={{$user->email}} />
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            SDT
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_name" name="phone"
                                   placeholder="Your phone" style="margin-bottom: 10px" type="text" value={{$user->phone}} />
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
                                   value={{$user->birth}} />
                        </div>
                    </div>

                    <div id="div_id_name" class="form-group required" >
                        <label for="id_name" class="control-label col-md-4  requiredField">
                            Quận/Huyện
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-5 " style="margin-bottom: 10px">
                            <select class="selectpicker form-control" name="district" onchange="Changed(this)">
                                @foreach($communes as $commune)
                                    @if($user->communes_id == $commune->id)
                                        @foreach($districts as $district)
                                            @if($district->id == $commune->districts_id)
                                                <option value={{$district->id}} selected > {{$district->name}} </option>
                                            @else
                                                <option value={{$district->id}} > {{$district->name}} </option>
                                            @endif
                                        @endforeach
                                        @break
                                    @endif
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
                                @foreach($communes as $commune){
                                    @if($user->communes_id == $commune->id){
                                        <option value={{$commune->id}} selected > {{$commune->name}} </option>
                                        @foreach($communes as $commune2){
                                            @if($commune->districts_id == $commune2->districts_id && $commune->id != $commune2->id)
                                                <option value={{$commune2->id}}> {{$commune2->name}} </option>
                                            @endif
                                        }
                                        @endforeach
                                    }
                                    @endif
                                }
                                @endforeach
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
                                   placeholder="Your location" style="margin-bottom: 10px" type="text" value={{$user->address}} />
                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">
                            nhập lại mật khẩu
                            <span class="asteriskField">*</span>
                        </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_password1" name="password1"
                                   placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            @if($alert == 'saimk')
                                <div class="alert alert-danger" role="alert">
                                    Mật khẩu không khớp, vui lòng nhập lại!
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

<script>
    function change(obj) {
        var value = obj.value;
        console.log(value);
    }
</script>

