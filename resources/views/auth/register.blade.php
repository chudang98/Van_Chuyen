@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2>Information to Login</h2>
                            {{-- Nhập số điện thoại --}}
                            <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                        @if ($errors->has('phone'))
                                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                        
                                    </div>
                                </div>
                            {{-- Nhập password --}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <h2>Personal information</h2>

                            {{-- Nhập Lastname --}}
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Last name">
                                    @if ($errors->has('lastname'))
                                        <div class="alert alert-danger">{{ $errors->first('lastname') }}</div>
                                    @endif

                                </div>
                            </div>
    
                            {{-- Nhập Firstname --}}
                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="First">
    
                                    @if ($errors->has('firstname'))
                                        <div class="alert alert-danger">{{ $errors->first('firstname') }}</div>
                                     @endif
                                </div>
                            </div>
    
    
    
                            {{-- Nhập email --}}
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
    

    
                            {{-- Nhập địa chỉ --}}
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
    
                                    @if ($errors->has('address'))
                                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Choose detail address') }}</label>
                                <div class="col-md-4">
                                    <select name="district" id="district" class='dynamic form-control'>
                                        <option value="">--District--</option>
                                        @foreach ($districts as $element)
                                            <option value="{{ $element->id }}"> {{ $element->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select  class="form-control" name="commune" id="commune" style='width: 173px' required>
                                        <option value="">--Commune--</option>
                                    </select>
                                    @if ($errors->has('commune'))
                                        <div class="alert alert-danger">{{ $errors->first('commune') }}</div>
                                    @endif
                                </div>

                            </div>

                            
                            {{-- Nhập ngày tháng năm sinh --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>    
                                <div class="col-md-6">
                                    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                                    @if ($errors->has('date'))
                                        <div class="alert alert-danger">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                            </div>
                        

    
    
    
                            {{-- Button Đăng ký --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        {{ __('Sign up') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val != ''){
                    var value = $(this).val();
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        method : 'GET',
                        dataType : 'json',
                        url : "{{ route('register.selectDistrict') }}",
                        data : {
                            district : value,
                            _token : _token,
                        },
                        success : function(result){
                            var commune = $('#commune').empty();
                            $.each(result, function(index){
                            $('#commune').append($('<option>', {
                                    value: result[index].id,
                                    text: result[index].name,
                                }));
                            });
                        },
                        error : function(){
                            var commune = $('#commune').empty();
                            
                        }
                    });
                }
            });
            $('input').keypress(function(){
                $(this).siblings('.alert-danger').hide();
            })
        });
    </script>    
@endsection
