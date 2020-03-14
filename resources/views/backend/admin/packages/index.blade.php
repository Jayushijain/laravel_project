@extends('layouts.backend_layout')

@section('content')

<!-- start page title -->
<div class="row ">
	<div class="col-lg-12">
		<a href="{{ route('packages.create') }}" class="btn btn-primary alignToTitle"><i class="mdi mdi-plus"></i>Add New Package</a>
	</div><!-- end col-->
</div>
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
							<div class="category-actions">
		            <a href = "{{ route('packages.edit',$package->id ) }}" class="btn btn-info" style="margin-right:5px;">
		  						Edit
		  					</a>

		            <a href = "javascript::" class="btn btn-red" style="float: right; margin-right:5px;" onclick="confirm_modal('{{ 'packages' }}','{{ $package->id }}' );">
		  						Delete
		  					</a>
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


@stop