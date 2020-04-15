@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-6">
    <div class="row">
      <div class="col-sm-6">
        <div class="tile-title tile-primary">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
                {{ currency(Auth::user()->packagePurchasedHistories->sum('amount_paid')) }}
              </h3>
            <p>
              Total Amount Spent
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-red">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              @php
              $wishlisted_items = json_decode(Auth::user()->value('wishlists'));
              @endphp
              {{ count($wishlisted_items) }}
            </h3>
            <p>
              Number Of Wishlisted Items
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-blue">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              @php
              $active_listing = Auth::user()->listings->where('status',1)->count()
              @endphp
              {{ $active_listing }}
            </h3>
            <p>
                Number Of Active Listing
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-aqua">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              @php
              $pending_listing = Auth::user()->listings->where('status',0)->count()
              @endphp
              {{ $pending_listing }}
            </h3>
            <p>
                Number Of Pending Listing
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="row">
      @if ($currently_active_package)
        @if ($currently_active_package->package_id > 0)
        @php
          $package_details = App\Package::where('id',$currently_active_package->package_id)->first();
          @endphp
          <div class="col-sm-12">
            <div class="tile-progress tile-blue">
              <div class="tile-header">
                <span>Currently Active Package Name :</span>
                <h3>{{ $package_details->name }}</h3>
              </div>
              <div class="tile-progressbar">
                <span data-fill="100%"></span>
              </div>
              <div class="tile-footer">
                <h4>
                  <span>Expiry Date{!! ' : <b>'.date('D, d M Y', strtotime($currently_active_package->expired_date)).'</b>' !!}</span><br>
                  <span>Purchase Date{!! ' : <b>'.date('D, d M Y', strtotime($currently_active_package->purchased_date)).'</b>' !!}</span><br><br>
                  <span><a href="<?php //echo site_url('user/packages'); ?>" class="btn btn-white">More Info</a></span><br>
                </h4>
              </div>
            </div>
          </div>
          @endif
      @else
        <div class="col-sm-12">
          <div class="tile-progress tile-red">
            <div class="tile-header">
              <h3>No Package Is Currently Active</h3>
            </div>
            <div class="tile-progressbar">
              <span data-fill="100%"></span>
            </div>
            <div class="tile-footer">
              <h4>
                <span><a href="<?php //echo site_url('user/packages'); ?>" class="btn btn-white btn-rounded">Buy Package</a></span><br>
              </h4>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>


@stop