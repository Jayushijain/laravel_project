@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Update : {{ $listing->name }}
				</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('user_listings.update',$listing->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered listing_edit_form">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="col-md-12">
						<ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
							<li class="active">
								<a href="#first" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-home"></i></span>
									<span class="hidden-xs">Basic</span>
								</a>
							</li>
							<li>
								<a href="#second" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-user"></i></span>
									<span class="hidden-xs">Location</span>
								</a>
							</li>
							<li>
								<a href="#third" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-mail"></i></span>
									<span class="hidden-xs">Amenities</span>
								</a>
							</li>
							<li>
								<a href="#fourth" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">Media</span>
								</a>
							</li>
							<li>
								<a href="#fifth" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">SEO</span>
								</a>
							</li>
							<li>
								<a href="#sixth" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">Schedule</span>
								</a>
							</li>
							<li>
								<a href="#seventh" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">Contact</span>
								</a>
							</li>
							<li>
								<a href="#eighth" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">Type</span>
								</a>
							</li>
							<li>
								<a href="#ninth" data-toggle="tab">
									<span class="visible-xs"><i class="entypo-cog"></i></span>
									<span class="hidden-xs">Finish</span>
								</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="first">
								@include('backend.admin.listings.edit.edit_basic')
							</div>

							<div class="tab-pane" id="second">
								@include('backend.admin.listings.edit.edit_location')
							</div>

							<div class="tab-pane" id="third">
								@include('backend.admin.listings.edit.edit_amenity')
							</div>

							<div class="tab-pane" id="fourth">
								@include('backend.admin.listings.edit.edit_media')
							</div>

							<div class="tab-pane" id="fifth">
								@include('backend.admin.listings.edit.edit_seo')
							</div>

							<div class="tab-pane" id="sixth">
								@include('backend.admin.listings.edit.edit_schedule')
							</div>

							<div class="tab-pane" id="seventh">
								@include('backend.admin.listings.edit.edit_contact')
							</div>

							<div class="tab-pane" id="eighth">
								@include('backend.admin.listings.edit.edit_type')
							</div>
							<div class="tab-pane" id="ninth">
								@include('backend.admin.listings.edit.edit_finish')
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>

@stop

@section('scripts')

<script type="text/javascript">
	function getCityList(country_id) {
		$.ajax({
			type : 'POST',
			url : '<?php // echo site_url('home/get_city_list_by_country_id'); ?>',
			data : {country_id : country_id},
			success : function(response) {
				$('#city_id').html(response);
			}
		});
	}
	var blank_category = $('#blank_category_field').html();
	var blank_photo_uploader = $('#blank_photo_uploader').html();
	var blank_special_offer_div = $('#blank_special_offer_div').html();
	var blank_food_menu_div = $('#blank_food_menu_div').html();
	var blank_beauty_service_div = $('#blank_beauty_service_div').html();
	var blank_hotel_room_specification_div = $('#blank_hotel_room_specification_div').html();
	var listing_type_value = $('.listing-type-radio').val();

	$(document).ready(function() {
		$('#blank_category_field').hide();
		$('#blank_photo_uploader').hide();
		$('#blank_special_offer_div').hide();
		$('#blank_food_menu_div').hide();
		$('#blank_beauty_service_div').hide();
		$('#blank_hotel_room_specification_div').hide();
		showListingTypeForm('<?php //echo $listing_details['listing_type']; ?>');
	});

	function appendHotelRoomSpecification() {

		jQuery('#hotel_room_specification_div').append(blank_hotel_room_specification_div);
		let selector = jQuery('#hotel_room_specification_div .hotel_room_specification_div');

		let rand = Math.random().toString(36).slice(3);

		$(selector[selector.length - 1]).find('label.btn').attr('for', 'room-image-' + rand );
		$(selector[selector.length - 1]).find('input.image-upload').attr('id', 'room-image-' + rand );
		$(".bootstrap-tag-input").tagsinput('items');
		initImagePreviewer();
	}

	function removeHotelRoomSpecification(elem) {
		jQuery(elem).closest('.hotel_room_specification_div').remove();
		$(".bootstrap-tag-input").tagsinput('items');
		removeFromDatabase('hotel', elem.id);
	}

	function appendFoodMenu() {

		jQuery('#food_menu_div').append(blank_food_menu_div);
		let selector = jQuery('#food_menu_div .food_menu_div');

		let rand = Math.random().toString(36).slice(3);

		$(selector[selector.length - 1]).find('label.btn').attr('for', 'menu-image-' + rand );
		$(selector[selector.length - 1]).find('input.image-upload').attr('id', 'menu-image-' + rand );
		$(".bootstrap-tag-input").tagsinput('items');
		initImagePreviewer();
	}

	function removeFoodMenu(elem) {
		jQuery(elem).closest('.food_menu_div').remove();
		$(".bootstrap-tag-input").tagsinput('items');
		removeFromDatabase('food_menu', elem.id);
	}

	function appendBeautyService() {

		jQuery('#beauty_service_div').append(blank_beauty_service_div);
		let selector = jQuery('#beauty_service_div .beauty_service_div');

		let rand = Math.random().toString(36).slice(3);

		$(selector[selector.length - 1]).find('label.btn').attr('for', 'service-image-' + rand );
		$(selector[selector.length - 1]).find('input.image-upload').attr('id', 'service-image-' + rand );
		$(".bootstrap-tag-input").tagsinput('items');
		initImagePreviewer();
	}

	function removeBeautyService(elem) {
		jQuery(elem).closest('.beauty_service_div').remove();
		$(".bootstrap-tag-input").tagsinput('items');
		removeFromDatabase('beauty_service', elem.id);
	}

	function appendSpecialOffer() {

		jQuery('#special_offer_div').append(blank_special_offer_div);
		let selector = jQuery('#special_offer_div .special_offer_div');

		let rand = Math.random().toString(36).slice(3);

		$(selector[selector.length - 1]).find('label.btn').attr('for', 'product-image-' + rand );
		$(selector[selector.length - 1]).find('input.image-upload').attr('id', 'product-image-' + rand );
		$(".bootstrap-tag-input").tagsinput('items');
		initImagePreviewer();
	}

	function removeSpecialOffer(elem) {
		jQuery(elem).closest('.special_offer_div').remove();
		$(".bootstrap-tag-input").tagsinput('items');
		removeFromDatabase('product', elem.id);
	}

	function appendCategory() {
		jQuery('#category_area').append(blank_category);
	}

	function removeCategory(categoryElem) {
		jQuery(categoryElem).closest('.appendedCategoryFields').remove();
	}

	function appendPhotoUploader() {
		jQuery('#photos_area').append(blank_photo_uploader);
	}

	function removePhotoUploader(photoElem) {
		jQuery(photoElem).closest('.appendedPhotoUploader').remove();
	}

	function showListingTypeForm(listing_type) {
		listing_type_value = listing_type;
		if (listing_type === "shop") {
			$('#special_offer_parent_div').show();
			$('#food_menu_parent_div').hide();
			$('#beauty_service_parent_div').hide();
			$('#hotel_room_specification_parent_div').hide();
			$('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Products');
		}
		else if (listing_type === "hotel") {
			$('#special_offer_parent_div').hide();
			$('#food_menu_parent_div').hide();
			$('#beauty_service_parent_div').hide();
			$('#hotel_room_specification_parent_div').show();
			$('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Rooms');
		}
		else if (listing_type === "restaurant") {
			$('#special_offer_parent_div').hide();
			$('#food_menu_parent_div').show();
			$('#beauty_service_parent_div').hide();
			$('#hotel_room_specification_parent_div').hide();
			$('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Food Menu');
		}else if (listing_type === "beauty") {
			$('#special_offer_parent_div').hide();
			$('#food_menu_parent_div').hide();
			$('#beauty_service_parent_div').show();
			$('#hotel_room_specification_parent_div').hide();
			$('#demo-btn').html('<i class="mdi mdi-eye"></i> Preview Food Menu');
		}else {
			$('#special_offer_parent_div').hide();
			$('#food_menu_parent_div').hide();
			$('#hotel_room_specification_parent_div').hide();
			$('#demo-btn').html('<i class="mdi mdi-eye"></i> No Preview Available');
		}
	}

	function removeFromDatabase(type, id) {
		$.ajax({
			type : 'POST',
			url : '<?php //echo site_url('admin/remove_listing_inner_feature'); ?>',
			data : {type : type, id : id},
			success : function(response) {
				success_notify('Removed Successfully');
			}
		});
	}

  // This fucntion checks the minimul required fields of listing form
  function checkMinimumFieldRequired() {
  	var title = $('#title').val();
  	var defaultCategory = $('#category_default').val();
  	var latitude = $('#latitude').val();
  	var longitude = $('#longitude').val();
  	if (title === "" || defaultCategory === "" || latitude === "" || longitude === "") {
  		error_notify('Listing Title, Listing Category, Latitude, Longitude Can Not Be Empty');
  	}else {
  		$('.listing_edit_form').submit();
  	}
  }

  // Show Listing Type Wise Demo
  function showListingTypeWiseDemo(param) {
  	if (listing_type_value === 'hotel') {
  		showAjaxModal('<?php //echo base_url();?>modal/popup/preview_of_details/hotel_room', 'Preview');
  	}
  	if (listing_type_value === 'restaurant') {
  		showAjaxModal('<?php //echo base_url();?>modal/popup/preview_of_details/food_menu', 'Preview');
  	}
  	if (listing_type_value === 'shop') {
  		showAjaxModal('<?php //echo base_url();?>modal/popup/preview_of_details/special_offers', 'Preview');
  	}
  	if (listing_type_value === 'beauty') {
  		showAjaxModal('<?php //echo base_url();?>modal/popup/preview_of_details/beauty_service', 'Preview');
  	}
  }
</script>

@stop