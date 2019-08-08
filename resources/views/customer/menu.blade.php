<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/menu.css')}}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{URL::asset('assets/logo.png')}}" alt="logo">
            <div class="text">
                <h5>My Drive</h5>
                <h4>Go!</h4>
            </div>
        </div>
        <div class="user">
            <a href="/ttTaiKhoan" class="user_avatar">
                <span><i class="fa fa-user"></i></span>
                <span>{{ auth()->user()->name }}</span>
            </a>
            <a href="#"><i class="fa fa-bell notice"></i></a>
            <a href="#" class="help">
                <span><i class="fa fa-question-circle-o"></i></span>
            </a>



        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 menu">
                <ul>
                    <li class="item1">
                        <a href="/home">
                            <i class="fa fa-car car "></i>
                            <span>New Order</span>
                        </a>
                    </li>
                    <li class="item2">
                        <a href="/dsDonHang">
                            <i class="fa fa-clock-o clock"></i>
                            <span>Order list</span>
                        </a>
                    </li>
                    <li class="item5">
                        <a href="#">
                            <i class="fas fa-user-plus user_plus"></i>
                            <span>Invite friend</span>
                        </a>
                    </li>
                    <li class="item6">
                        <a href="/logout">
                            <i class="fa fa-sign-out sign_out"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-11 main">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('script')
</body>
</html>
