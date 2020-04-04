@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Reported Listings
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Title</div></th>
              <th><div>Reported By</div></th>
              <th><div>Reason</div></th>
              <th><div>Status</div></th>
              <th><div>Option</div></th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @foreach ($reported_listings as $reported_listing)
	            @php
	              $listing_details = $reported_listing->listing;
	              $listing_creator = $listing_details->user;
	              //App\User::where('id',$listing_details->user_id);
	              $reporter = $reported_listing->reporter;	
	            @endphp
              <tr>
                <td>{{ ++$counter }}</td>
                <td>
                  <strong><a href="{{ get_listing_url($listing_details->id) }}" target="_blank">{{ strlen($listing_details->name) > 20 ? substr($listing_details->name,0,20)."..." : $listing_details->name }}</a></strong><br>
                  <small>
                    {!! $listing_creator->name.'<br/>'.date('D, d-M-Y', strtotime($listing_details->created_at)) !!}
                  </small>
                </td>
                <td>
                  {{ $reporter->name }}<br>
                  <small>
                    {{ date('D, d-M-Y', strtotime($listing_details->created_at)) }}
                  </small>
                </td>
                <td>
                  {{ $reported_listing->report }}
                </td>
                <td class="text-center">
                	<span class="mr-2">
                  @if ($reported_listing->status == 0)
                    <i class="entypo-record" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending"></i>
                  @elseif ($reported_listing->status == 1)
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
                        <li><a href="<?php //echo site_url('admin/listing_form/edit/'.$listing_details['id']); ?>">Edit</a></li>
                        @if ($reported_listing->status == 0)
                          <li><a href="javascript::" onclick="confirm_modal('reported_listing',{{ $reported_listing->id }}, 'generic_confirmation');">Mark As Active</a></li>
                        @elseif ($reported_listing->status == 1)
                          <li><a href="javascript::" onclick="confirm_modal('reported_listing',{{ $reported_listing->id }}, 'generic_confirmation');">Mark As Pending</a></li>
                        @endif
                        <li><a href="{{ get_listing_url($listing_details->id) }}" target="_blank">View In Websitew</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript::" onclick="confirm_modal('reported_listings',{{ $reported_listing->id }});">Delete This Report</a></li>
                        <li><a href="javascript::" onclick="confirm_modal('listings',{{ $reported_listing->listing_id }});">Delete This Listing</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="dropleft">
                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                    </ul>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- end col-->
</div>
@stop