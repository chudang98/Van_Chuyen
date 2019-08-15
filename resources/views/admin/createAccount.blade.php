@extends('admin.layout')

@section('content')
        <div class="panel-body" >
            <form  action="/saveAccount" class="form-horizontal" method="post" >
                @csrf
                <div class="row" style="margin:20px 0px 40px 0px; ">
                    <div class="inf_personal col-md-5" >
                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField">
                                Name
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
                            <label for="id_email" class="control-label col-md-4  requiredField">
                                Birth
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
                                District
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
                                Commune
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
                                Apartment number
                                <span class="asteriskField">*</span>
                            </label>
                            <div class="controls col-md-8 ">
                                <input required class="input-md textinput textInput form-control" id="id_location" name="address"
                                       placeholder="Your location" style="margin-bottom: 10px" type="text" @if (isset($address)) value="{{$address}}" @endif/>
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required" >
                            <label for="id_name" class="control-label col-md-4  requiredField">
                                Role
                                <span class="asteriskField">*</span>
                            </label>
                            <div class="controls col-md-5 " style="margin-bottom: 10px">
                                <select class="selectpicker form-control" name="user_type" >
                                    <option value="Quản trị viên" > Quản trị viên </option>
                                    <option value="Nhân viên vận chuyển" > Nhân viên vận chuyển </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1" style="border-right: 1px solid #6c757d; height: 400px;"></div>
                    <div class="inf_login col-md-5" >
                        <div id="div_id_name" class="form-group required">
                            <label for="id_name" class="control-label col-md-4  requiredField">
                                Phone
                                <span class="asteriskField">*</span>
                            </label>
                            <div class="controls col-md-8 ">
                                <input required class="input-md textinput textInput form-control" id="id_name" name="phone"
                                       placeholder="Your phone" style="margin-bottom: 10px" type="text" @if (isset($phone)) value="{{$phone}}" @endif/>
                            </div>
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">
                                Password
                                <span class="asteriskField">*</span>
                            </label>
                            <div class="controls col-md-8 ">
                                <input required class="input-md textinput textInput form-control" id="id_password1" name="password1"
                                       placeholder="Create a password" style="margin-bottom: 10px" type="password" />
                            </div>
                        </div>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField">
                                Confirm password
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
                    </div>
                </div>
                <div class="form-group">
                    <div class="aab controls col-md-4 "></div>
                    <div class="controls col-md-2 ">
                        <input onclick="window.location.href='/dsTaiKhoan'" type="button" name="Signup" value="Cancel"
                               class="btn btn btn-info" id="button-id-signup" />
                    </div>
                    <div class="controls col-md-6 ">
                        <input type="submit" name="Signup" value="Confirm" class="btn btn-primary btn btn-primary"
                               id="submit-id-signup" />
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('script')
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
@endsection
