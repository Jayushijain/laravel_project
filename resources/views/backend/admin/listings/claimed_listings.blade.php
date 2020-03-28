@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Claimed Listing
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Listing</div></th>
              <th><div>Name</div></th>
              <th><div>Phone</div></th>
              <th><div>Additional Information</div></th>
              <th><div>Status</div></th>
              <th><div>Option</div></th>
            </tr>
          </thead>
          <tbody>
            @php
             $counter = 0; 
            @endphp
            @foreach ($claimed_listings as $claimed_listing)
            <tr>
              <td>{{ ++$counter }}</td>
              <td>
                <a href="{{-- route('claimed_listing.create') --}}" target="blank">
                  {{ $claimed_listing->listing->name }}
                </a>
              </td>
              <td>{{ $claimed_listing->user->name }}</td>
              <td>{{ $claimed_listing->phone }}</td>
              <td>{{ $claimed_listing->additional_information }}</td>
              <td>
                @if($claimed_listing->status == 1)
                  <span class="label label-success">Approved</span>
                @endif
                @if($claimed_listing->status == 0)
                  <span class="label label-success">Pending</span>
                @endif
              </td>
              <td class="text-center">
                <a href="{{ route('claimed_listing.status.update',$claimed_listing->id) }}" class="btn btn-info btn-sm btn-icon icon-left">
        					<i class="entypo-check"></i>
        					Approve
        				</a>
        				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('{{ 'claimed_listings' , $claimed_listing->id }}');">
        					<i class="entypo-cancel"></i>
        					Delete
        				</a>
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
