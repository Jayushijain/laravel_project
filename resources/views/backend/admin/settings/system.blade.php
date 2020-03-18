@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          System Settings
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('system.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        	
			{{ csrf_field() }}

          <div class="form-group">
            <label for="website_title" class="col-sm-3 control-label">Website Title</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="website_title" id="website_title" placeholder="Website Title" value="{{ get_settings('website_title') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="system_title" class="col-sm-3 control-label">System Title</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="system_title" id="system_title" placeholder="System Title" value="{{ get_settings('system_title') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="system_email" class="col-sm-3 control-label">System Email</label>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="system_email" id="system_email" placeholder="System Email" value="{{ get_settings('system_email') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-7">
              <textarea name="address" class="form-control" rows="8" cols="80">{{ get_settings('address') }}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ get_settings('phone') }}">
            </div>
          </div>

          <div class="form-group">
            <label for="country_id" class="col-sm-3 control-label">Country</label>

            <div class="col-sm-7">
              <select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="Select Country">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="timezone" class="col-sm-3 control-label">Timezone</label>

          <div class="col-sm-7">
            <select name="timezone" id = "timezone" class="select2" data-allow-clear="true" data-placeholder="Select Timezone">
              @php 
              $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL)
              @endphp
              @foreach ($tzlist as $tz)
                <option value="{{ $tz }}" @if(get_settings('timezone') == $tz) {{ 'selected' }} @endif>{{ $tz }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="purchase_code" class="col-sm-3 control-label">Purchase Code</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="purchase_code" id="purchase_code" placeholder="Purchase Code" value="{{ get_settings('purchase_code') }}">
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
{{-- <div class="col-lg-5">
  <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
      <div class="panel-title">
        Update Product
      </div>
    </div>
    <div class="panel-body">
      <form action="" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">File</label>
          <div class="col-sm-7">
            <input type="file" class="form-control btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" id="file_name" name="file_name" />
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}
</div>

@stop