@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-body">
        <div class="invoice">
        	<div class="row">
        		<div class="col-sm-6 invoice-left">
        			<a href="#">
        				<img src="{{ asset('global/dark_logo.png') }}" height="30"/>
        			</a>
        		</div>
        		<div class="col-sm-6 invoice-right">
        			<h3>Invoice</h3>
        			<span><b>Printed On</b> : {{ date('D, d/M/Y') }}</span>
        		</div>
        	</div>
        	<hr class="margin" />
        	<div class="row">
        		<div class="col-sm-3 invoice-left">
        			<h4>Billing To</h4>
                    {{ ucwords($user_details->name) }}<br>
                    {{ ucwords($user_details->address) }}<br>
                    {{ $user_details->phone }}<br>
        		</div>
        		<div class="col-sm-3 invoice-left">
        			<h4>Billing From</h4>
                    {{ ucwords(get_settings('website_title')) }}<br>
                    {{ get_settings('address') }}<br>
                    {{ get_settings('phone') }}<br>
        		</div>
        		<div class="col-md-6 invoice-right">
        			<h4>Payment Details:</h4>
        			<strong>Purchase Date:</strong> {{ date('D, d-M-Y', strtotime($purchase_history->purchase_date)) }}
        			<br />
        			<strong>Purchase Status:</strong> <span class="label label-success float-right">Paid</span>
        			<br />
        			<strong>Order Id No:</strong> <span class="float-right">{{ sprintf('%07d', $purchase_history->id) }}</span>
        		</div>

        	</div>

        	<div class="margin"></div>

        	<table class="table table-bordered">
        		<thead>
        			<tr>
                <th>#</th>
                <th>Package Name</th>
                <th>Expired Date</th>
                <th>Cost</th>
                <th class="text-right">Total</th>
        			</tr>
        		</thead>

        		<tbody>
        			<tr>
                <td>1</td>
                <td>
                  <b>{{ ucwords($package_details->name) }}</b> <br/>
                </td>
                <td>{{ date('D, d-M-Y', strtotime($purchase_history->expired_date)) }}</td>
                <td>{{ currency($purchase_history->amount_paid) }}</td>
                <td class="text-right">{{ currency($purchase_history->amount_paid) }}</td>
        			</tr>
        		</tbody>
        	</table>
        	<div class="margin"></div>
        	<div class="row">
        		<div class="col-sm-6">
        		</div>
        		<div class="col-sm-6">
        			<div class="invoice-right">
        				<ul class="list-unstyled">
        					<li>
        						Sub Total Amount:
        						<strong>{{ currency($purchase_history->amount_paid) }}</strong>
        					</li>
        					<li>
        						Grand Total:
        						<strong>{{ currency($purchase_history->amount_paid) }}</strong>
        					</li>
        				</ul>
        				<br />
        				<a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
        					Print Invoice
        					<i class="entypo-doc-text"></i>
        				</a>
        				&nbsp;
        			</div>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </div><!-- end col-->
</div>

@stop
