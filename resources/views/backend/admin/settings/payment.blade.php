@extends('layouts.backend_layout')

@section('content')

@php

// Paypal Keys
$paypal_settings = get_settings('paypal');
$paypal = json_decode($paypal_settings,true);

// Stripe Keys
$stripe_settings = get_settings('stripe');
$stripe = json_decode($stripe_settings,true);
@endphp
<!-- start page title -->
<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          System Currency Settings
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('currency.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        	{{ csrf_field() }}

          <div class="form-group">
            <label for="system_currency" class="col-sm-3 control-label">System Currency</label>

            <div class="col-sm-7">
              <select name="system_currency" id = "system_currency" class="select2" data-allow-clear="true" data-placeholder="System Currency">
                <option value="">Select System Currency</option>
                @foreach ($currencies as $currency)
                <option value="{{ $currency->code }}"
                  @if (get_settings('system_currency') == $currency->code) {{ 'selected' }} @endif> {{ $currency->code }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="currency_position" class="col-sm-3 control-label">Currency Position</label>
          <div class="col-sm-7">
            <select name="currency_position" id = "currency_position" class="select2" data-allow-clear="true" data-placeholder="Currency Position">
              <option value="left" @if (get_settings('currency_position') == 'left') {{ 'selected' }} @endif>Left</option>
              <option value="right" @if (get_settings('currency_position') == 'right') {{ 'selected' }} @endif> Right</option>
              <option value="left-space" @if (get_settings('currency_position') == 'left-space') {{ 'selected' }} @endif>Left With A Space</option>
              <option value="right-space" @if (get_settings('currency_position') == 'right-space'){{ 'selected' }} @endif >Right With A Space</option>
            </select>
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info">Update System Currency</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
<div class="col-md-5">
  <div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Heads Up!</h4>
    <p>Please Make Sure That "System Currency", "Paypal Currency" and "Stripe Currency" Are Same.</p>
  </div>
</div>
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Setup Paypal Settings
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('paypal.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        	{{ csrf_field() }}
          <div class="form-group">
            <label for="paypal_active" class="col-sm-3 control-label">Active</label>

            <div class="col-sm-7">
              <select name="paypal_active" id = "paypal_active" class="select2" data-allow-clear="true" data-placeholder="Paypal Active">
                <option value="0" @if ($paypal['active'] == 0) {{ 'selected' }} @endif> No</option>
                <option value="1" @if ($paypal['active'] == 1) {{ 'selected' }} @endif> Yes</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="paypal_mode" class="col-sm-3 control-label">Mode</label>

          <div class="col-sm-7">
            <select name="paypal_mode" id = "paypal_mode" class="select2" data-allow-clear="true" data-placeholder="Paypal Mode">
              <option value="sandbox" @if ($paypal['mode'] == 'sandbox') {{ 'selected' }} @endif> Sandbox</option>
              <option value="production" @if ($paypal['mode'] == 'production') {{ 'selected' }} @endif> Production</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="paypal_currency" class="col-sm-3 control-label">Paypal Currency</label>

          <div class="col-sm-7">
            <select name="paypal_currency" id = "paypal_currency" class="select2" data-allow-clear="true" data-placeholder="Paypal Currency">
              <option value="">Select Paypal Currency</option>
              @foreach ($paypal_currencies as $p_currency)
              <option value="{{ $p_currency->code }}"
                @if (get_settings('paypal_currency') == $currency->code) {{ 'selected' }} @endif> {{ $p_currency->code }}
              </option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
      		<label for="name" class="col-sm-3 control-label">Client Id (Sandbox)</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="sandbox_client_id" id="sandbox_client_id" placeholder="Sandbox Client Id"  value="{{ $paypal['sandbox_client_id'] }}" required >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="production_client_id" class="col-sm-3 control-label">Client Id (Production)</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="production_client_id" id="production_client_id" placeholder="Production Client Id"  value="{{ $paypal['production_client_id'] }}" required >
      		</div>
      	</div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info">Update Paypal Keys</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Setup Stripe Settings
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('stripe.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        	{{ csrf_field() }}
          <div class="form-group">
            <label for="stripe_active" class="col-sm-3 control-label">Active</label>

            <div class="col-sm-7">
              <select name="stripe_active" id = "stripe_active" class="select2" data-allow-clear="true" data-placeholder="Stripe Active">
                <option value="0" @if ($stripe['active'] == 0) {{ 'selected' }} @endif> No</option>
                <option value="1" @if ($stripe['active'] == 1) {{ 'selected' }} @endif> Yes</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="testmode" class="col-sm-3 control-label">Test Mode</label>

          <div class="col-sm-7">
            <select name="testmode" id = "testmode" class="select2" data-allow-clear="true" data-placeholder="Test Mode">
              <option value="on" @if ($stripe['testmode'] == 'on') {{ 'selected' }} @endif> On</option>
              <option value="off" @if ($stripe['testmode'] == 'off') {{ 'selected' }} @endif> Off</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="stripe_currency" class="col-sm-3 control-label">Stripe Currency</label>

          <div class="col-sm-7">
            <select name="stripe_currency" id = "stripe_currency" class="select2" data-allow-clear="true" data-placeholder="Stripe Currency">
              <option value="">Select Stripe Currency</option>
              @foreach ($currencies as $currency)
              <option value="{{ $currency->code }}"
                @if (get_settings('stripe_currency') == $currency->code) {{ 'selected' }} @endif> {{ $currency->code }}
              </option>
            @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
      		<label for="secret_key" class="col-sm-3 control-label">Test Secret Key</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="secret_key" id="secret_key" value="{{ $stripe['secret_key'] }}" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="public_key" class="col-sm-3 control-label">Test Public Key</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="public_key" id="public_key" value="{{ $stripe['public_key'] }}" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="secret_live_key" class="col-sm-3 control-label">Live Secret key</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="secret_live_key" id="secret_live_key" value="{{ $stripe['secret_live_key'] }}" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="public_live_key" class="col-sm-3 control-label">Live Public key</label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="public_live_key" id="public_live_key" value="{{ $stripe['public_live_key'] }}" >
      		</div>
      	</div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info">Update Stripe Keys</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
</div>


@stop

@section('scripts')


@stop