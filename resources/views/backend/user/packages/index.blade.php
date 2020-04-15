@extends('layouts.backend_layout')

@section('content')

@php
// Paypal Keys
$paypal_settings = get_settings('paypal');
$paypal = json_decode($paypal_settings,'true');
// print_r($paypal);
// exit();

// Stripe Keys
$stripe_settings = get_settings('stripe');
$stripe = json_decode($stripe_settings,'true');
@endphp
<!-- start page title -->
<div class="row">
	<div class="col-lg-12">
		<!-- Pricing Title-->
		<div class="text-center">
			<h3 class="mb-2">Our Plans And Pricings</h3>
			<p class="text-muted w-50 m-auto">
				We Have Plans And Prices That Fit Your Business Perfectly
			</p>
		</div>
		<div class="gallery-env">
			<div class="row">
				@foreach ($packages as $package)
					<div class="col-sm-4">
						<article class="album">
							<section class="album-info text-center">
								<h2><a href="extra-gallery-single.html">{{ $package->name }}</a></h2>
								<p>
									<h4>
										<i>
											@if ($package->package_type == 0)
												<div class="label label-success">Free</div>
											@else
												{{ currency($package->price) }}<span>/ {{ $package->validity.' '.'Days' }}</span>
											@endif
										</i>
									</h4>
								</p>
								<p>
									@if ($package->is_recommended == 1)
										<div class="label label-info">Recommended</div>
									@endif
								</p>
							</section>

							<footer class="text-center">
								<div class="album-images-count"> {{ $package->number_of_listings.' '.'listings' }} {{ 'This Package' }}</div>
							</footer>
							<footer>
								<div class="album-images-count">{{ $package->number_of_categories.' '.'categories' }} {{ 'Per Listing' }} </div>
							</footer>
							<footer>
								<div class="album-images-count">{{ $package->number_of_photos.' '.'Photos' }}  {{ 'Per Listing' }} </div>
							</footer>
							<footer>
								<div class="album-images-count"> {{ $package->number_of_tags.' '.'Tags' }} {{ 'Per Listing' }} </div>
							</footer>
							<footer>
								<div class="album-images-count"> {{ $package->ability_to_add_contact_form == 1 ? 'Availability Of' : 'Unavailability Of' }} {{ 'Contact Form' }} </div>
							</footer>
							<footer>
								<div class="album-images-count"> {{ $package->ability_to_add_video == 1 ? 'Availability Of' : 'Unavailability Of' }} {{ 'Video' }} </div>
							</footer>
							<footer>
								<div class="album-images-count"> {{ $package->featured == 1 ? 'Featured Listings allowed' : 'Featured Listings Unallowed' }} </div>
							</footer>
							<footer>
								<div class="album-images-count"> {{ $package->validity.' '.'Days' }} {{ 'Listing' }} </div>
							</footer>
							
							<div class="category-actions text-center">
								@php
									$package_type = $package->package_type;
									$total_submited_package = 0;
									$sumited_packages = App\Listing::where('user_id',Auth::user()->id)->get();
									@endphp
									@foreach($sumited_packages as $sumited_package)
										@php
										$total_submited_package++;
										@endphp
									@endforeach
									@if($package_type == 0)
										@if($total_submited_package > $package->number_of_listings)
											{!! "<span style = 'color: red;'>".'Listings Capacity Limited , Please Choose A Upper Level Package'."</span>" !!}
										@else
											<a href="<?php //echo site_url('user/free_package/free/'.$this->session->userdata('user_id').'/'.$package['id'].'/0') ?>" class="btn btn-primary mt-4 mb-2 btn-rounded">Choose Plan</a>
										@endif
									@else
										@if($total_submited_package > $package->number_of_listings)
											{!! "<span style = 'color: red;'>".'Listings Capacity Limited , Please Choose A Upper Level Package'."</span>" !!}
										@else
											<button class="btn btn-orange mt-4 mb-2 btn-rounded" onclick="showPaymentDiv('{{ $package->id }}')">Choose Plan</button>
										@endif
									@endif
		          			</div>
		          			<div class="row pl-1 pr-1 payment-section" style="display: none;" id = "payment-section-{{ $package->id }}">
								<div class="col-12 text-center">
									@if($stripe['active'] == 1)
										<a href = "{{ url('user/stripe_checkout/'.$package->id) }}" class="btn btn-primary btn-rounded" style="margin-bottom: 20px;" target="_blank"> Pay With Stripe</a>
									@endif
									@if($paypal['active'] == 1)
										<a href="{{ url('user/paypal_checkout/'.$package->id) }}" class="btn btn-primary btn-rounded" style="margin-bottom: 20px;" target="_blank">Pay With Paypal</a>
									@endif
								</div>
							</div>
						</article>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')

<script type="text/javascript">
	function showPaymentDiv(package_id) {
		console.log('payment-section-'+package_id);
		$('.payment-section').each(function () {
		    if (this.id == 'payment-section-'+package_id) {
				$('#payment-section-'+package_id).slideToggle();
		    }else {
				$('#'+this.id).slideUp();
			}
		});
	}
</script>

@stop