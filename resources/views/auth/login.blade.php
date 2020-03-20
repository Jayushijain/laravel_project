@extends('layouts.frontend_home_layout') 

@section('content') 
@include('frontend.header')

<div class="sub_header_in sticky_header">
  <div class="container">
    <h1>
    Get Logged In<?php //echo $title; ?>
    </h1>
  </div>
  <!-- /container -->
</div>
<!-- /sub_header -->

<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Already registered</h3>
                <!-- aria-label="{{ __('Login') }} -->
                <form class="" action="{{ route('login') }}" method="POST">
                @csrf    
                    <div class="form_container">
                        <div class="divider">
                            <span>
                                <?php //echo get_phrase('login_credentials'); ?>Login credentials</span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Email*"
                                value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password"
                                value="" placeholder="Password*" required> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="clearfix add_bottom_15">
                            <!-- <div class="float-right"><a id="forgot-pass" href="{{ route('password.request') }}<?php //echo site_url('home/forgot_password'); ?>"> <small><?php //echo get_phrase('lost_password'); ?>Lost password?</small> {{ __('Forgot Your Password?') }}</a></div> -->
                            <a class="float-right" id="forgot-pass" href="{{ route('password.request') }}">
                                <small>{{ __('Forgot Your Password?') }}</small>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-xl-7">
                                <div class="form-group">
                                    <label class="container_check">
                                        <small>
                                            Remember Me
                                            <input type="checkbox" name="remember">
                                            <span class="checkmark"></span>
                                        </small>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <!-- <input type="submit" value="Log In" class="btn_1 w-100"> -->
                                <button type="submit" value="Log In" class="btn_1 w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12">
                                <a id="sign_up" class="btn_1 full-width outline wishlist icon-login" href="{{ route('register') }}<?php //echo site_url('home/sign_up'); ?>">
                                    <?php //echo get_phrase("sign_up"); ?>Sign up</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection











<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
