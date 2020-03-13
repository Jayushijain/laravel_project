@extends('layouts.frontend_home_layout') 

@section('content') 
@include('frontend.header')

<div class="sub_header_in sticky_header">
  <div class="container">
    <h1>
    Pricing<?php //echo $title; ?>
    </h1>
  </div>
  <!-- /container -->
</div>
<!-- /sub_header -->



<div class="container margin_80_55">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Price packages</h2>
		<p>Choose the best package that suits you.</p>
	</div>
	<div class="pricing-container cd-has-margins">
		<ul class="pricing-list bounce-invert">
			<?php //$packages = $this->crud_model->get_packages()->result_array();
			foreach ($packages as $key => $package):?>
			<li <?php if($package['is_recommended'] == 1):?> class="popular" <?php endif; ?>>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $package['name']; ?></h2>
							<div class="price">
								<span class="price-value"><?php echo currency($package['price']);//echo currency($package['price']); ?></span>
								<span class="price-duration"><?php echo $package['validity'].' days';//echo $package['validity'].' '.get_phrase('days'); ?></span>
							</div>
						</header>
						<!-- /pricing-header -->
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em><?php echo $package['number_of_listings'].' Listings'; ?></em> This Package</li>
								<li><em><?php echo $package['number_of_categories'].' Categories'; ?></em> Per Listing</li>
								<li><em><?php echo $package['number_of_photos'].' Photos'; ?></em> Per Listing</li>
								<li><em><?php echo $package['number_of_tags'].' Tags'; ?></em> Per Listing</li>
								<li><em><?php echo $package['ability_to_add_contact_form'] == 1 ? 'Availability Of' : 'Unavailability Of'; ?></em> Contact Form</li>
								<li><em><?php echo $package['ability_to_add_video'] == 1 ? 'Availability Of' : 'Unavailability Of'; ?></em> Video</li>
								<li><?php echo $package['featured'] == 1 ?'<em>'.'Featured'.' '.'Listings'.' '.'</em>'.' '.'Allowed' : '<em>'.'Featured'.' '.'Listings'.' '.'</em>'.' '.'Unallowed'; ?>
								<li><em><?php echo $package['validity'].' days' ?></em> listing</li>
							</ul>
						</div>
						<!-- /pricing-body -->
						<footer class="pricing-footer">
							<?php
								$package_type = $package['package_type'];
								if($package_type == 0){
							?>
								<a class="select-plan" href="/packages">Free</a>
							<?php
								}else{
							?>
							<a class="select-plan" href="/packages">Select</a>
						<?php } ?>
						</footer>
					</li>
				</ul>
				<!-- /cd-pricing-wrapper -->
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>







@endsection