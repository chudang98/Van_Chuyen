<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        
    <meta charset="UTF-8">
    <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/admin.css')}}">
    @yield('css')

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <header>
                <div class="logo">
                    <img src="{{URL::asset('assets/logo.png')}}" alt="logo">
                    <div class="text">
                        <h5>My Drive</h5>
                        <h4>Go!</h4>
                    </div>
                </div>
                <div class="user header-right">
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
            <div class="container-fluid ad-container">
                <div class="row">
                    <div class="col-md-2 side-bar">
                        <ul>
                            <li><a href="/home">Dashboard</a></li>
                            <li><a href="/dsTaiKhoan">Account Mangagement</a></li>
                            <li><a href="/orders">Order Mangagement</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-md-10 content">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div> 
    </div>

    @yield('script')
</body>
</html>