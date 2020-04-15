@extends('layouts.backend_layout')

@section('content')

<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
      <div class="panel-title">
        Purchased Packages
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-bordered datatable">
      	<thead>
      		<tr>
      			<th width="80"><div>#</div></th>
      			<th><div>Package Name</div></th>
      			<th><div>Purchase Date</div></th>
      			<th><div>Expired Date</div></th>
      			<th><div>Amount Paid</div></th>
      			<th><div>Payment Method</div></th>
      			<th><div>Action</div></th>
      		</tr>
      	</thead>
      	<tbody>
          @foreach ($purchase_histories as $key => $purchase_history)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                {{ App\Package::where('id',$purchase_history->package_id)->value('name') }}
                @php
                $active_package = has_package(Auth::user()->id, true);
                @endphp
                @if ($active_package->id == $purchase_history->id)
                  <br> <small><span class="badge badge-success ">Currently Active</span></small>
                @endif
              </td>
              <td>{{ date('D, d-M-Y', strtotime($purchase_history->purchase_date)) }}</td>
              <td>{{ date('D, d-M-Y', strtotime($purchase_history->expired_date)) }}</td>
              <td>{{ currency($purchase_history->amount_paid) }}</td>
              <td>{{ ucfirst($purchase_history->payment_method) }}</td>
              <td class="text-center"> <a href="<?php //echo site_url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-primary"><i class="entypo-print"></i> Print Invoice</a> </td>
            </tr>
          @endforeach
      	</tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>

@stop