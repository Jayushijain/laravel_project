@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-10">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
         {{ $page_info['page_title'] }}
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('offline_payment.store') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="user" class="col-sm-3 control-label">User</label>
            <div class="col-sm-7">
              <select name="user_id" id = "user" class="select2" data-allow-clear="true" data-placeholder="Select User" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="package" class="col-sm-3 control-label">Choose Package</label>

          <div class="col-sm-7">
            <select name="package_id" id = "package" class="select2" data-allow-clear="true" data-placeholder="Select Package" required>
              <option value="">Select Package</option>
              @foreach($packages as $package)
                <option value="{{ $package->id }}">{{ $package->name.' '.'('.currency_code_and_symbol().$package->price.')' }}</option>
              @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="amount" class="col-sm-3 control-label">Payment Amount {{ '('.currency_code_and_symbol().')' }}</label>

        <div class="col-sm-7">
          <input type="number" class="form-control" name="amount_paid" id="amount" value="0" placeholder="Amount" required>
        </div>
      </div>

      <div class="form-group">
        <label for="payment_method" class="col-sm-3 control-label">Payment Method(Cash/Card)</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="payment_method" id="payment_method" placeholder="Payment Method" required>
        </div>
      </div>

      <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
        <button type="submit" class="btn btn-info">Add User To Package</button>
      </div>
    </form>
  </div>
</div>
</div><!-- end col-->
</div>


@stop