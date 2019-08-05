@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">    
@endsection

@section('content')
    @include('auth.dangnhap')
@endsection

