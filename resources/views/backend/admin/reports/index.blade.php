@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Date Wise Filter
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-offset-3 col-lg-6">
						<form class="form-inline" action="{{-- {{ route('reports.daterange') }} --}}" method="post">
							{{-- <input type="hidden" name="range" value="{{ $post->id }}"> --}}
							{{ csrf_field() }}
							<div class="col-lg-10">
								<div id="reportrange" class="daterange daterange-inline add-ranges" data-format="MMMM D, YYYY" data-start-date="{{ date("F d, Y" , $page_info['timestamp_start']) }}" data-end-date="{{ date("F d, Y" , $page_info['timestamp_end']) }}">
									<i class="entypo-calendar"></i>
									<span id="selectedValue">{{ date("F d, Y" , $page_info['timestamp_start']) . " - " . date("F d, Y" , $page_info['timestamp_end']) }}</span>
								</div>
								<input id="date_range" type="hidden" name="date_range" value="{{ date("d F, Y" , $page_info['timestamp_start']) . " - " . date("d F, Y" , $page_info['timestamp_end']) }}">
							</div>
							<div class="col-lg-2">
								<button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> Filter</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end col-->
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed = "0">
			<div class="panel-heading">
				<div class="panel-title">
					Purchase Histories
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th width="80"><div>#</div></th>
									<th><div>Date</div></th>
									<th><div>Buyer</div></th>
									<th><div>Package</div></th>
									<th><div>Amount Paid</div></th>
									<th><div>Actions</div></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($purchase_histories as $key => $purchase_history)	
									<tr>
										<td>{{ $key+1 }}</td>
										<td>
											{{ date('D d-M-Y', strtotime($purchase_history->purchase_date)) }}
										</td>
										<td>
											{{ $user_details = App\User::where('id',$purchase_history->user_id)->pluck('name')[0]  }}
										</td>
										<td>
											{{ $package_details = App\Package::where('id',$purchase_history->package_id)->pluck('name')[0] }}
										</td>
										<td>
											${{ $purchase_history->amount_paid }}
											@if($purchase_history->amount_paid > 0 )
												@if($purchase_history->payment_method == 'stripe' || $purchase_history->payment_method == 'paypal')	
													<small><span class="badge badge-success ">{{ $purchase_history->payment_method }}</span></small>
												@else
													<small><span class="badge badge-info ">{{ $purchase_history->payment_method }}</span></small>
													
												@endif
											@else
												<small><span class="badge badge-dark ">{{ $purchase_history->payment_method }}</span></small>
											@endif
										</td>
										<td class="text-center">
											<a href="#" class="btn btn-primary"><i class="mdi mdi-printer"></i>Invoice</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</script>


@stop

@section('scripts')

<script type="text/javascript">
function update_date_range()
{
	var x = $("#selectedValue").html();
	$("#date_range").val(x);
}

@stop