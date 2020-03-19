@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-8">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          SMTP Settings
        </div>
      </div>
      <div class="panel-body">
        <form action="{{ route('smtp.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        	{{ csrf_field() }}
          <div class="form-group">
            <label for="smtp_protocol" class="col-sm-3 control-label">Smtp Protocol</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_protocol" id="smtp_protocol" placeholder="Smtp Protocol" value="{{ get_settings('protocol') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_host" class="col-sm-3 control-label">Smtp Host</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_host" id="smtp_host" placeholder="Smtp Host" value="{{ get_settings('smtp_host') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_port" class="col-sm-3 control-label">Smtp Port</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_port" id="smtp_port" placeholder="Smtp Port" value="{{ get_settings('smtp_port') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_user" class="col-sm-3 control-label">Smtp User</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_user" id="smtp_user" placeholder="Smtp User" value="{{ get_settings('smtp_user') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_pass" class="col-sm-3 control-label">Smtp Password</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_pass" id="smtp_pass" placeholder="Smtp Password" value="{{ get_settings('smtp_pass') }}" required>
            </div>
          </div>

          <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
            <button type="submit" class="btn btn-info">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- end col-->
</div>


@stop
