<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text" name="username">
        <input type="text" name="pass">
        <button type="submit">Đăng nhập</button>
    </form>
    <script src="{{ URL::asset('js/login.js') }}"></script>
</body>
</html>