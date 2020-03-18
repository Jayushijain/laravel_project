@extends('layouts.frontend_home_layout') 

@section('content') 
@include('frontend.header')

<?php
$reviews = get_listing_wise_review($listing_detail['id']);
// $quality = get_rating_wise_quality($listing_detail['id'])->quality;
$rating = get_listing_wise_rating($listing_detail['id']);
$review = get_listing_wise_review($listing_detail['id']);
$reviewer = get_listing_wise_review($listing_detail['id']);
?>

                                                            
<div class="hero_in shop_detail" style="background: url('{{ asset('uploads/listing_cover_photo')}}/{{$listing_detail['listing_cover']}}') center center no-repeat; background-size: cover;">
	<!-- <div class="wrapper">
		<span class="magnific-gallery">
			<?php 
					foreach (json_decode($listing_detail['photos']) as $key => $photo):
						echo asset('uploads/listing_images/').$photo;
						echo $listing_detail['name'];
						echo $key == 0 ? 'view_photos' : 'view_photos'; 
					endforeach; 
			?>
		</span>
	</div> -->
</div>
<!--/hero_in-->

<nav class="secondary_nav sticky_horizontal_2">
	<div class="container">
		<ul class="clearfix">
			<li><a href="#description" class="active">Description</a></li>
			<li><a href="#reviews">Reviews</a></li>
			<li><a href="#sidebar">Booking</a></li>
		</ul>
	</div>
</nav>

<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-8">
			<section id="description">
				<div class="detail_title_1">
					<div class="row">
						<div class="col-6">
							
						</div>
						<div class="col-6">
							
						</div>
					</div>
					<h1>
					
						<?php 
							echo $listing_detail['name'];
						?>

						<?php //$claiming_status=claiming_status($listing_detail['id']);//$claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing_id))->row('status'); ?>
		                <?php //if($claiming_status->status == 1): ?>
		                	<!-- <span style="font-size: 20px;"><i class='icon-check text-success'></i></span> -->
		                <?php //endif; ?>
					</h1>
					<?php if ($listing_detail['latitude'] != "" && $listing_detail['longitude'] != ""): ?>
						<a class="address" href="http://maps.google.com/maps?q=<?php echo $listing_detail['latitude']; ?>,<?php echo $listing_detail['longitude']; ?>" target="_blank"><?php echo $listing_detail['address']; ?></a>
					<?php endif; ?>
				</div>

				<div class="add_bottom_15">
					<?php 
					$categories = json_decode($listing_detail['categories']);
					for ($i = 0; $i < sizeof($categories); $i++):
						$category_name = get_category_name($categories[$i]);
						// $this->db->where('id',$categories[$i]);
						// $category_name = $this->db->get('category')->row()->name;
					?>
					<span class="loc_open mr-2">
						<a href="home/filter_listings?category='.slugify($category_name).'&&status=all" 
							style="color: #32a067;">
							<?php echo $category_name;?> 
						
						</a>
					</span>
					<?php
					endfor;
					?>
				</div>

				<h5>About</h5>
				<p>
					<?php echo $listing_detail['description']; ?>
				</p>
				
				<!-- Photo Gallery -->
				<?php if (count(json_decode($listing_detail['photos'])) > 0): ?>
					<h5 class="add_bottom_15">Photo Gallery</h5>
					<div class="grid-gallery">
						<ul class="magnific-gallery">
							<?php foreach (json_decode($listing_detail['photos']) as $key => $photo): ?>
								<?php if (file_exists('uploads/listing_images/'.$photo)): ?>
									<li>
										<figure>
											<img src="{{ asset('uploads/listing_images')}}/{{$photo}}" alt="">
											<figcaption>
												<div class="caption-content">
													<a href="(asset'uploads/listing_images')}}/{{$photo}}" title="" data-effect="mfp-zoom-in">
														<i class="pe-7s-plus"></i>

													</a>
												</div>
											</figcaption>
										</figure>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<hr>
				@include('frontend.contact_and_social')
				
				<h5 class="add_bottom_15">Amenities</h5>
				<div class="row add_bottom_30">
					<?php foreach (json_decode($listing_detail['amenities']) as $key => $amenity): ?>
						<div class="col-md-4">
							<ul class="bullets">
								<li><?php echo get_amenity_name($amenity);?></li>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- /row -->

				<!-- Opening and Closing Time -->
				@include('frontend.opening_and_closing_time_schedule')

				<!-- Listing Type Wise Inner Page -->
				@if($listing_detail['listing_type'] == 'hotel')
					<hr>
					@include('frontend.hotel_listing_inner_page')
				@elseif ($listing_detail['listing_type'] == 'shop')
					<hr>
					@include('frontend.shop_listing_inner_page')
				@elseif ($listing_detail['listing_type'] == 'restaurant')
					<hr>
					@include('frontend.restaurant_listing_inner_page')
				@elseif ($listing_detail['listing_type'] == 'beauty')
					<hr>
					@include('frontend.beauty_listing_inner_page')
				<@endif
				<!-- /row -->

				<!-- Video File Base On Package-->
				@include('frontend.video_player')
				
				
				<hr>
				<h3>Location</h3>
				<div id="categorySideMap" class="map-full map-layout single-listing-map" style="z-index: 50;"></div>
				<!-- End Map -->
			</section>
			<!-- /section -->
			<!-- Section Of Review Starts -->
			@include('frontend.listing_reviews')
			<!-- /section -->

			<?php //$google_analytics_id = $this->db->get_where('listing', array('id' => $listing_id))->row('google_analytics_id'); ?>
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $listing_detail['google_analytics_id']; ?>"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', '<?php echo $listing_detail['google_analytics_id']; ?>');
			</script>
		</div>
		<!-- /col -->

		<!-- Contact Form Base On Package-->
		<?php //if(has_package_feature('ability_to_add_contact_form', $listing_details['user_id']) == 1): ?>
			<aside class="col-lg-4" id="sidebar">
				<div class="box_detail booking">
					<form class="contact-us-form" action="home/contact_us/{{$listing_detail['listing_type']}}" method="post">
						<input type="hidden" name="user_id" value="<?php echo $listing_detail['user_id']; ?>">
						<input type="hidden" name="requester_id" value="<?php //echo Auth::user()->id; ?>">
						<input type="hidden" name="listing_id" value="<?php echo $listing_detail['id']; ?>">
						<input type="hidden" name="listing_type" value="<?php echo $listing_detail['listing_type']; ?>">
						<input type="hidden" name="slug" value="<?php echo slugify($listing_detail['name']); ?>">
						@if ($listing_detail['listing_type'] == 'hotel')
							@include('frontend.hotel_room_booking_contact_form')
						@elseif ($listing_detail['listing_type'] == 'restaurant')
							@include('frontend.restaurant_booking_contact_form')
						@elseif($listing_detail['listing_type'] == 'beauty')
							@include('frontend.beauty_service_contact_form')
						@else
							@include('frontend.general_contact_form')
						@endif
						<a href="javascript::" class="add_top_30 btn_1 full-width purchase" onclick="getTheGuestNumberForBooking('<?php echo $listing_detail['listing_type']; ?>')">submit</a>
					</form>
					<a href="javascript:" onclick="addToWishList('<?php echo $listing_detail['id']; ?>')" class="btn_1 full-width outline wishlist" id ="btn-wishlist"><i class="icon_heart"></i> <?php echo is_wishlisted($listing_detail['id']) ? 'remove_from_wishlist' : 'add_to_wishlist' ?></a>
					<div class="text-center"><small>No money charged in this step</small></div>
				</div>

				<ul class="share-buttons">
					<li><a href ="https://www.facebook.com/sharer/sharer.php?u=u" class="fb-share" target="_blank"><i class="social_facebook"></i> Share</a></li>
					<li><a href ="https://twitter.com/share?url=u" target ="_blank" class="twitter-share"><i class="social_twitter"></i> Tweet</a></li>
					<li><a href ="http://pinterest.com/pin/create/link/?url=u" target="_blank" class="gplus-share"><i class="social_pinterest"></i> Pin</a></li>
				</ul>
			</aside>
		<?php //endif; ?>

	</div>
	<!-- /row -->
</div>
<!-- /container -->

<script type="text/javascript">
var isLoggedIn = '<?php //echo $this->session->userdata('is_logged_in'); ?>';

// This function performs all the functionalities to add to wishlist
function addToWishList(listing_id) {
	if (isLoggedIn === '1') {
		$.ajax({
			type : 'POST',
			url : 'home/add_to_wishlist',
			data : {listing_id : listing_id},
			success : function(response) {
				if (response == 'added') {
					$('#btn-wishlist').html('<i class="icon_heart"></i>Remove from wishlist');
				}else {
					$('#btn-wishlist').html('<i class="icon_heart"></i>Add to wishlist');
				}
			}
		});
	}else {
		loginAlert();
	}
}

// This function shows the Report listing form
function showClaimForm(){
	$('#claim_form').toggle();
	$('#report_form').hide();
}
// This function shows the Report listing form
function showReportForm() {
	$('#report_form').toggle();
	$('#claim_form').hide();
}

// This function return the number of different types of guests
function getTheGuestNumberForBooking(listing_type) {
	if (isLoggedIn === '1') {
		if (listing_type === "restaurant" || listing_type === "hotel") {
			$('#adult_guests_for_booking').val($('#adult_guests').val());
			$('#child_guests_for_booking').val($('#child_guests').val());
		}

		$('.contact-us-form').submit();
	}else {
		loginAlert();
	}

}
</script>

<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'js/frontend/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<script>
createListingsMap({
	mapId: 'categorySideMap',
	jsonFile: '{{asset('js/frontend/map/listing-geojson.json')}}'
});
</script>
@endsection