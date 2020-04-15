@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Booking Request For Hotel
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Listing</div></th>
              <th><div>Date</div></th>
              <th><div>Additional Information</div></th>
              <th><div>Status</div></th>
              <th width="200"><div>Options</div></th>
            </tr>
          </thead>
          <tbody>
            @php
            $count = 1;
            @endphp
            @foreach($bookings as $booking)
              @php $listing_type = $booking->listing->listing_type @endphp
              <tr>
                <td>{{ $count }}</td>
                <td>{{ $booking->listing->name }}</td>
                <td>
                  @if($listing_type == 'hotel')
                    @php $booking_date = explode(' | ', $booking->booking_date) 
                    @endphp
                    {!! 'Booking Date : '.'<b>'.date('d M Y', strtotime($booking_date[0])).' - '.date('d M Y', strtotime($booking_date[1])).'</b>' !!}                    
                  @else
                    {!! 'Booking Date'.' : <b>'.date('d M Y', strtotime($booking->booking_date)).'</b>' !!}    
                  @endif
                 {!!  '<br>'.'Requesting Date : '.date('d M Y', strtotime($booking->created_at)) !!}           
                </td>
                <td>
                  <h5 class="mt-0 mb-1">{{ $booking->user->name }}</h5>
                  @php
                  $informations = json_decode($booking->additional_information)
                  @endphp
                  @foreach($informations as $key=>$value)
                    <span> {{ get_key($key) }} : {{  $value }}</span><br>
                  @endforeach
                </td>
                <td>
                  @if($listing_type == 'hotel')
                  @php
                    $booking_date = explode(' | ', $booking->booking_date);
                    $expired_date = $booking_date[1];
                  @endphp
                  @else
                    @php
                      $expired_date = $booking->booking_date;
                    @endphp
                  @endif
                  @if($expired_date >= date('Y-m-d'))
                    @if($booking->status == 0)
                      <span class="label label-warning">Pending</span>
                    @else
                      <span class="label label-success">Approved</span>
                    @endif
                  @else
                    <span class="label label-danger">Expired</span>
                  @endif
                </td>
                <td style="text-align: center;">
                @if($listing_type == 'hotel')
                @php
                    $booking_date = explode(' | ', $booking->booking_date);
                    $expired_date = $booking_date[1];
                    @endphp
                  @else
                  @php
                    $expired_date = $booking->booking_date;
                    @endphp
                  @endif
                  @if($expired_date >= date('Y-m-d'))
                    @if($booking->status == 0)
                      <a href="{{ route('user_booking.status.update',['approved',$booking->id]) }}" class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-check"></i>
                        Approve
                      </a>
                    @else
                      <a href="{{ route('user_booking.status.update',['pending',$booking->id]) }}" class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-check"></i>
                        Pending
                      </a>
                    @endif
                  @endif
                  <a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('{{ 'user_bookings' }}','{{ $booking->id }}');">
                    <i class="entypo-cancel"></i>
                    Delete
                  </a>
                </td>
              </tr>
              {{ $count++ }}
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@stop

@section('scripts')


@stop