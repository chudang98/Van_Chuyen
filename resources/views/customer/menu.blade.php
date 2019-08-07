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
                <h4>My Drive</h4>
                <h3>Go!</h3>
            </div>
        </div>
        <div class="user">
            <a href="/ttTaiKhoan" class="user_avarta">
                <span><i class="fa fa-user"></i></span>
                <span>{{ auth()->user()->name }}</span>
            </a>
            <a href="#" class="help">
                <span><i class="fa fa-question-circle-o"></i></span>
                <span>Help</span>
            </a>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 menu">
                <ul>
                    <li class="item1"><a href="#"><i class="fa fa-car car "></i></a></li>
                    <li class="item2"><a href="/dsDonHang"><i class="fa fa-clock-o clock"></i></a></li>
                    <li class="item3"><a href="#"><i class="fa fa-credit-card card"></i></a></li>
                    <li class="item4"><a href="#"><i class="fa fa-bell bell"></i></a></li>
                    <li class="item5"><a href="#"><i class="fas fa-user-plus user_plus"></i></a></li>
                    <li class="item6"><a href="#"><i class="fa fa-sign-out sign_out"></i></a></li>
                </ul>
            </div>
            <div class="col-md-11 main">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
