@extends('layouts.frontend_home_layout') @section('content') @include('frontend.header')

<div class="sub_header_in sticky_header">
    <div class="container">
        <h1>
            Get Register Yourself
            <?php //echo $title; ?>
        </h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">
                    <?php //echo get_phrase('new_user'); ?>New user
                </h3>
                <small class="float-right pt-2">*
                    <?php //echo get_phrase('required_fields'); ?>Required fields
                </small>
                <form class="" action="{{ route('register') }}<?php //echo site_url('login/register_user') ?>" method="post">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="<?php //echo get_phrase('email'); ?>Email*"
                                value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="<?php //echo get_phrase('password'); ?>Password*"
                                required> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="" placeholder="<?php //echo get_phrase('password'); ?>Confirm password*"
                                required>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="<?php //echo get_phrase('name'); ?>Name*"
                                        value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="<?php //echo get_phrase('address'); ?>Address*" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="<?php //echo get_phrase('phone'); ?>Phone*" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="form-group">
                                    <label class="container_check">
                                        <small>
                                            Accept<a href="/terms_and_conditions"> terms and condition</a>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </small>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="row">
              <div class="col-md-6">
                <input type="submit" value="Sign Up" class="btn_1 full-width">
              </div>
              <div class="col-md-6">
                <a id="login" class="btn_1 full-width" href="<?php //echo site_url('home/login'); ?>">Login</a>
              </div>
            </div> -->
                        <div class="row mt-1">
                            <div class="col-md-12 mb-2">
                                <input type="submit" value="Sign Up" class="btn_1 w-100">
                            </div>
                            <div class="col-md-12">

                                <a id="login" class="btn_1 full-width outline wishlist icon-login" href="/login">Login</a>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    required autofocus> 
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required> 
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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> 
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
