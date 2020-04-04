@extends('layouts.backend_layout')

@section('content')

@if (!isset($status)) 
  @php $status = 2; @endphp
@endif       

@if (!isset($user_id))
  @php $user_id = 'all'; @endphp
@endif

<div class="row ">
  <div class="col-lg-12">
    <a href="{{ route('listings.create') }}" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New Listing</a>
  </div><!-- end col-->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Filter
        </div>
      </div>
      <div class="panel-body">
        <div class="row">
          <form action="{{ route('listings.filter') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-offset-2 col-md-3">
              <div class="form-group">
                <div class="col-sm-12">
                  <select name="status" id = "status_filter" class="select2 form-control" data-allow-clear="true" data-placeholder="Status Filter">
                    <option value="2" @if($status == 2) {{ 'selected' }} @endif>All Status</option>
                    <option value="0" @if($status == 0) {{ 'selected' }} @endif>Pending</option>
                    <option value="1" @if($status == 1) {{ 'selected' }} @endif>Active</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="col-sm-12">
                  <select name="user_id" id = "user_filter" class="select2 form-control" data-allow-clear="true" data-placeholder="User Filter">
                    <option value="all" @if($user_id == 'all') {{ 'selected' }} @endif>All Users</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if($user_id == $user['id']) {{ 'selected' }} @endif>{{ ucwords($user->name) }}</option>
                    @endforeach
                  }
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <div class="col-sm-12">
                <!-- <button type="submit" class="btn btn-info btn-block"></button> -->
                <button type="submit" class="btn btn-info" style="margin-top: 5px;"><i class="entypo-search"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- end col-->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Listings
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Title</div></th>
              <th><div>Categories</div></th>
              <th><div>Location</div></th>
              <th><div>Status</div></th>
              <th><div>Option</div></th>
            </tr>
          </thead>
          <tbody id = "listing_table">
            @php
            $counter = 0
            @endphp
            @foreach ($listings as $listing)
              <tr>
                <td>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="listings_id" value="{{ $listing->id }}" class="custom-control-input checkMark" id="{{ $counter }}">
                      <label class="custom-control-label" for="{{ $counter }}">
                        {{ ++$counter }}
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <strong>
                    <a href="{{ route('listings.edit',$listing->id) }}">
                      {{ $listing->name }}
                      @if ($listing->is_featured == 1)
                        <i class="entypo-star" style="color: #FF5722; font-size: 11px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Featured"></i>
                      @endif
                    </a>
                  </strong>
                  <br>
                  <small>
                  	{{ $listing->user->name }}
                    {!! '<br/>'.date('D, d-M-Y', strtotime($listing['created_at'])) !!}             
                  </small>
                </td>
                <td>
                  @php
                    $categories = explode(",",$listing->category_id);
                  @endphp
                  @foreach ($categories as $category)
                  @php
                  	$category_details = App\Category::where('id',$category)->first();
                  @endphp
                    <span class="badge badge-secondary">{{ $category_details->name }}</span><br>
                  @endforeach 
                </td>
                <td>
                	{{ $listing->country->name. ', '.$listing->city->name }}
                </td>
                <td class="text-center">
                  <span class="mr-2">
                    @if ($listing->status == 0)
                      <i class="entypo-record" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending"></i>
                    @elseif ($listing->status == 1)
                      <i class="entypo-record" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active"></i>
                    @endif
                  </span>
                </td>
                <td class="text-center">
                  <div class="bs-example">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-blue" role="menu">
                        <li><a href="#">View In Website</a></li>
                        <li><a href="{{ route('listings.edit',$listing->id) }}">Edit</a></li>
                        @if ($listing->status == 0)
                          <li>
                            <a href="javascript::" onclick="confirm_modal('listings/update_column', {{ $listing->id }},'generic_confirmation','status')">Mark As Active</a>
                          </li>
                        @else
                          <li><a href="javascript::" onclick="confirm_modal('listings/update_column', {{ $listing->id }},'generic_confirmation','status')">Mark As Pending</a></li>
                        @endif

                        @if ($listing->is_featured == 1)
                          <li><a href="javascript::" onclick="confirm_modal('listings/update_column',{{ $listing->id }}, 'generic_confirmation','is_featured');">Remove From Featured</a></li>
                        @elseif ($listing->is_featured == 0)
                          <li><a href="javascript::" onclick="confirm_modal('listings/update_column',{{ $listing->id }}, 'generic_confirmation','is_featured');">Mark As Featured</a></li>
                        @endif
                        <li class="divider"></li>
                        <li><a href="javascript::" onclick="confirm_modal('listings', {{ $listing->id }});">Delete</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <button class="btn btn-danger" id="delete_listings" style="display: none;">Delete Selected</button>
      </div>
    </div>
  </div><!-- end col-->
</div>

@stop

@section('scripts')

<script type="text/javascript">
function filterTable() {
  $('#preloader_gif').show();
  update_date_range();
  var status = $('#status_filter').val();
  var user = $('#user_filter').val();
  var date_range = $('#date_range').val();

  $.ajax({
    type : 'POST',
    url : '<?php //echo site_url('admin/filter_listing_table'); ?>',
    data : {status : status, user : user, date_range : date_range},
    success : function(response){
      $('#listing_table').html(response);
      $('#preloader_gif').hide();
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    }
  })
}

function update_date_range()
{
  var x = $("#selectedValue").html();
  $("#date_range").val(x);
}
</script>


<script>
//start multiple delete
$(document).ready(function() {
  $(".checkMark").click(function(){

    //for button hide and show
    var favorite = [];
    $.each($("input[name='listings_id']:checked"), function(){
      favorite.push($(this).val());
    });
    if(favorite != ''){
      $('#delete_listings').show();
      $('#delete_listings').animate({
        width: '200px'
      }, 300);

    }else{
      $('#delete_listings').animate({
        width: '130px'
      }, 300);
      $('#delete_listings').slideUp(80);
    }

    //for delete to database
    $('#delete_listings').click(function(){
      var vals = [];
      $(":checkbox").each(function() {
        if (this.checked)
        vals.push(this.value);
      });
      var listings_id = vals.toString();
      $.ajax({
        url: ''+ listings_id,
        success: function(response){
          location.reload();
        }
      });
    });
  });
});
</script>

@stop