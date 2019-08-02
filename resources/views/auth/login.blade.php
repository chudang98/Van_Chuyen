@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">    
@endsection

@section('content')
<div>
    @include('auth.dangnhap')
</div>
<div>
    @include('auth.dangky')
</div>
@endsection

