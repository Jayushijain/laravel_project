<?php
	$number_of_visible_categories = 10;
	$number_of_visible_amenities 	= 10;
	$number_of_visible_cities 		= 10;

	isset($category_ids) ? "" : $category_ids = array();
	isset($amenity_ids) ? "" 	: $amenity_ids = array();
	isset($city_id) ? "" 			: $city_id = 'all';
	isset($price_range) ? "" 			: $price_range = 0;
	isset($with_video) ? "" 	: $with_video = "";
	isset($with_open) ? "" 	: $with_open = "";
	isset($search_string) ? "": $search_string = "";
?>

<div class="container-fluid full-height">
	<div class="row row-height">
		<div class="col-lg-5 content-left order-md-last order-sm-last order-last fixed">
			<div id="results_map_view">
			   	<div class="container-fluid">
				   	<div class="row">
					   	<div class="col-10">
						   	<h4><strong><?php echo count($listings); ?></strong> Result for all</h4>
					   </div>
					   <div class="col-2">
						   <a href="#0" class="search_mob btn_search_mobile map_view"></a> <!-- /open search panel -->

					   </div>
				   </div>
				   <!-- /row -->
					<div class="search_mob_wp">
						<div class="custom-search-input-2 map_view">
							<form action="{{route('search')}}" method="post">
							{{csrf_field()}}
								<div class="form-group">
									<input class="form-control" name="search_string" type="text" value="<?php echo $search_string; ?>" placeholder="What are you looking for...">
									<i class="icon_search"></i>
								</div>
								<select class="wide" name="selected_category_id">
									<option value="all">All categories</option>
									<?php
									// $categories = $this->crud_model->get_categories()->result_array();
									foreach ($categories as $category):
										if($category->parent_id > 0)
										continue;?>
										<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
									<?php endforeach; ?>
								</select>
								<input type="submit" value="Search">
							</form>
						</div>
					</div>
					<!-- /search_mobile -->
			   </div>
			   <!-- /container -->
		   </div>
		   <!-- /results -->

			<div class="filters_listing version_3">
				<div class="container-fluid">
					<ul class="clearfix">
						<li class=" float-left mr-1">
							<div class="layout_view">
								<?php
									// $active_listing_view = $this->session->userdata('listings_view');
                                    $active_listing_view = 'listings_view';
									if($active_listing_view == 'list_view'){
										$color_list = 'text-success';
										$color_grid = null;
									}else{
										$color_grid = 'text-success';
										$color_list = null;
									}

								?>
								
								<a href="javascript::" id="list_view" onclick="toggleListingView('list_view')" class="<?php echo $color_list; ?>"><i class="icon-map mr-1"></i>map view</a>
							</div>
						</li>
						
						<li class=" float-left">
							<div class="layout_view">
								<?php
									// $active_listing_view = $this->session->userdata('listings_view');
                                    $active_listing_view = 'listings_view';
									if($active_listing_view == 'list_view'){
										$color_list = 'text-success';
										$color_grid = null;
									}else{
										$color_grid = 'text-success';
										$color_list = null;
									}

								?>
								
								<a href="javascript::" id="grid_view" onclick="toggleListingView('grid_view')" class="<?php echo $color_grid; ?>"><i class="icon-th mr-1"></i>grid view</a>
							</div>
						</li>

						<li><a class="btn_filt_map" data-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="filters" data-text-swap="Less filters" data-text-original="More filters">More filters</a></li>
					</ul>
				</div>
				<!-- /container -->
			</div>
			<!-- /filters -->

			<div class="collapse map_view" id="filters">
				<div class="container-fluid margin_30_5">
					<form class="filter-form" action="" method="get" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<h6>Category</h6>
								<ul class="">
									<?php
									$counter = 0;
									// $categories = $this->db->get('category')->result_array();
									foreach ($categories as $key => $category):
									if($category->parent_id > 0)
									continue;
									$counter++;
									?>
									
										<li class="<?php if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
											<label class="container_check"> <i class="<?php echo $category->icon_class; ?>"></i> <?php echo $category->name; ?> <small></small> <!-- Here will be the number of the total listing -->
												<input type="checkbox" name="category[]" class="categories" value="<?php echo $category->slug; ?>" onclick="filter(this)" <?php if(in_array($category->id, $category_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>

										<?php foreach (get_sub_category($category->id) as $sub_category):
												$counter++;
											?>
											<li class="ml-3 <?php if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
												<label class="container_check"> <?php echo $sub_category->name; ?> <small></small> <!-- Here will be the number of the total listing -->
													<input type="checkbox" name="category[]" class="categories" value="<?php echo $sub_category->slug; ?>" onclick="filter(this)" <?php if(in_array($sub_category->id, $category_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										<?php endforeach; ?>
									
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "category-toggle-btn" onclick="showToggle(this, 'hidden-categories')"><?php echo count($categories) > $number_of_visible_categories ? 'Show more' : ""; ?></a>
							</div>
							<div class="col-md-6">
								<h6>Amenities</h6>
								<ul>
									<?php
									$counter = 0;
									// $amenities = $this->crud_model->get_amenities()->result_array();
									foreach ($amenities as $amenity):
										$counter++;
									?>
									<?php if ($counter <= $number_of_visible_amenities): ?>
										<div class="">
											<li>
												<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
													<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										</div>
									<?php else: ?>
										<div class="hidden-amenities hidden">
											<li>
												<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
													<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										</div>
									<?php endif; ?>
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "amenity-toggle-btn" onclick="showToggle(this, 'hidden-amenities')">
								<?php echo count($amenities) > $number_of_visible_amenities ? 'show_more' : ""; ?></a>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<h6>Cities</h6>
								<ul>
									<li>
										<div class="">
											<input type="radio" id="city_all" name="city" class="city" value="all" onclick="filter(this)" <?php if($city_id == 'all') echo 'checked'; ?>>
											<label for="city_all">All</label>
										</div>
									</li>
									<?php
									$counter = 1;
									// $cities = $this->crud_model->get_cities()->result_array();
									$cities = App\City::all();
									foreach ($cities as $city):
										$counter++;
									?>
									<?php if ($counter <= $number_of_visible_cities): ?>
										<div class="">
											<li>
												<div class="">
													<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
											    <label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
												</div>
											</li>
										</div>
									<?php else: ?>
										<div class="hidden-cities hidden">
											<li>
												<div class="">
													<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
													<label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
												</div>
											</li>
										</div>
									<?php endif; ?>
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "city-toggle-btn" onclick="showToggle(this, 'hidden-cities')"><?php //echo count($cities) > $number_of_visible_cities ? get_phrase('show_more') : ""; ?></a>
							</div>

							<div class="col-md-6">
								<h6>Video</h6>
								<ul>
									<li>
										<label class="container_check"> <i class=""></i>With video
											<input type="checkbox" class="video_availability" name="with_video" value="1" onclick="filter(this)" <?php if($with_video == 1) echo 'checked'; ?>>
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>

								<h6>Opening status</h6>
								<ul>
									<li>
										<label class="container_check"> <i class=""></i>Open Now
											<input type="checkbox" class="openingStatus" name="with_open" value="open" onclick="filter(this)" <?php if($with_open == 'open') echo 'checked'; ?>>
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
							</div>
						</div>
						<!-- /row -->
						<div class="row">
							<div class="col-md-12">
								<div class="add_bottom_30">
									<h6>Price limit</h6>
									<div class="distance">Price within<span></span> <?php echo get_settings('system_currency'); ?></div>
									<input type="range" class="price-range" min="0" max="<?php //echo $this->frontend_model->get_the_maximum_price_limit_of_all_listings(); ?>" step="10" value="<?php //echo $price_range; ?>" data-orientation="horizontal" onchange="filter(this)">
								</div>
							</div>
						</div>
						<!-- /row -->
					</form>
				</div>
			</div>
			<!-- /Filters -->

			<?php
				foreach($listings as $listing):
				// if(!has_package($listing['user_id']) > 0)
				//  	continue; ?>

				<div class="strip map_view add_top_20 <?php if($listing->is_featured == 1) echo 'featured-tag-border'; ?>" id = "<?php echo $listing->code; ?>" >
					<div class="row no-gutters">
						<div class="col-4">
							<figure>
								<a href="/description/{{$listing->id}}"  id = "listing-banner-image-for-<?php echo $listing->code; ?>"  class="d-block h-100 img" style="background-image:url('{{ asset('uploads/listing_thumbnails') }}/{{$listing->listing_thumbnail}}')">
										<img src="{{ asset('uploads/listing_thumbnails')}}/{{ $listing->listing_thumbnail }}" class="img-fluid" alt="">
										<div class="read_more"><span>Watch details</span></div>
									</a>
									<small><?php echo $listing->listing_type == "" ? ucfirst('General') : ucfirst($listing->listing_type) ; ?></small>
									<?php if($listing->is_featured == 1): ?>
										<small class="featured-tag-list">Featured</small>
									<?php endif; ?>
							</figure>
						</div>
						<div class="col-8 <?php if($listing->is_featured == 1) echo 'featured-body'; ?>">
							<div class="wrapper">
								<a href="javascript::" class="wishlist-icon small" onclick="addToWishList(this, '<?php echo $listing->id; ?>')">
									<i class=" <?php echo is_wishlisted($listing->id) ? 'fas fa-heart' : 'far fa-heart'; ?> "></i>
								</a>
								<h3 class="ellipsis"><a href="/description/{{$listing->id}}"><?php echo $listing->name; ?></a></h3>
									<small>
										<?php echo get_city($listing->city_id).', '.get_country($listing->country_id); ?>
									</small>
									<p class="ellipsis">
										<?php echo $listing->description; ?>
									</p>
									<?php if ($listing->latitude != "" && $listing->longitude != ""): ?>
											<a class="address" href="javascript:" button-direction-id = "<?php echo $listing->code; ?>" target="">Show on map</a>
									<?php endif; ?>
							</div>
							<ul class="<?php if($listing->is_featured == 1) echo 'featured-footer'; ?>">
								<li><span class="<?php echo strtolower(now_open($listing->id)) == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo now_open($listing->id); ?></span></li>
								<li>
									<div class="score">
										<span>
											<?php
					            if(get_listing_wise_review($listing->id) > 0)
								{
									$qu = get_rating_wise_quality($listing->id);
									echo $qu->quality;
								}
								else
								{
									echo 'Unreviewed';
								}
					            ?>
											<em>
											<?php echo get_listing_wise_review($listing->id). '   Reviews'; ?>
											</em>
										</span>
										<strong><?php echo number_format((float)get_listing_wise_rating($listing->id), 1, '.', ''); ?></strong></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /strip map_view -->

			<?php endforeach; ?>			

			<!-- <p class="text-center add_top_30"><a href="#0" class="btn_1 rounded"><strong>Load more</strong></a></p> -->
			<nav class="text-center">
				<?php //echo $this->pagination->create_links(); ?>
			</nav>
		</div>
		<!-- /content-left-->

		<div class="col-lg-7 map-right">
			<div class="stiky-map-list custom-mt-7">
				<div id="categorySideMap" class="map-full map-layout responsive_map_view"></div>
			</div>
		</div>
		<!-- /map-right-->

	</div>
	<!-- /row-->
</div>
<!-- /container-fluid -->


<script type="text/javascript">
$(document).ready(function() {
	var deviceWidth = $(window).width();
	// windows laptop
	if (deviceWidth >= 1300 && deviceWidth <= 1450) {
		$('#sidebar').removeClass('col-xl-2');
		$('#sidebar').addClass('col-xl-3');
		$('#listings').removeClass('col-xl-5');
		$('#listings').addClass('col-xl-6');
	}
	//Macbook pro Ratina display
	if (deviceWidth >= 2550 && deviceWidth <= 2900) {
		$('#sidebar').removeClass('col-xl-2');
		$('#sidebar').addClass('col-xl-3');
		$('#listings').removeClass('col-xl-5');
		$('#listings').addClass('col-xl-6');
	}
});
	function filter(elem) {
		var urlPrefix 	= '<?php //echo site_url('home/filter_listings?'); ?>'
		var urlSuffix = "";
		var slectedCategories = "";
		var selectedAmenities = "";
		var selectedCity = "";
		var selectedVideoAvailability = 0;
		var selectedPriceRange = 0;
		var selectedOpeningStatus = "all";

		$('.categories:checked').each(function() {
			(slectedCategories === "") ? slectedCategories = $(this).attr('value') : slectedCategories = slectedCategories + "--" + $(this).attr('value');
		});

		$('.amenities:checked').each(function() {
			(selectedAmenities === "") ? selectedAmenities = $(this).attr('value') : selectedAmenities = selectedAmenities + "--" + $(this).attr('value');
		});

		$('.city:checked').each(function() {
			(selectedCity === "") ? selectedCity = $(this).attr('value') : selectedCity = selectedCity + "--" + $(this).attr('value');
		});

		$('.video_availability:checked').each(function() {
			(selectedVideoAvailability === 0) ? selectedVideoAvailability = $(this).attr('value') : selectedVideoAvailability = selectedVideoAvailability + "--" + $(this).attr('value');
		});
		$('.openingStatus:checked').each(function() {
			(selectedOpeningStatus === 'all') ? selectedOpeningStatus = $(this).attr('value') : selectedOpeningStatus = $(this).attr('value');
		});

		selectedPriceRange = $('.price-range').val();
		urlSuffix = "category="+slectedCategories+"&&amenity="+selectedAmenities+"&&city="+selectedCity+"&&price-range="+selectedPriceRange+"&&video="+selectedVideoAvailability+"&&status="+selectedOpeningStatus;
		window.location.replace(urlPrefix+urlSuffix);

		selectedPriceRange = $('.price-range').val();
		urlSuffix = "category="+slectedCategories+"&&amenity="+selectedAmenities+"&&city="+selectedCity+"&&price-range="+selectedPriceRange+"&&video="+selectedVideoAvailability+"&&status="+selectedOpeningStatus;
		window.location.replace(urlPrefix+urlSuffix);
	}

	function addToWishList(elem, listing_id) {
		var isLoggedIn = '{{ Auth::check() }}';
		if (isLoggedIn === '1') {
			$.ajax({
				type : 'POST',
				url : '<?php //echo site_url('home/add_to_wishlist'); ?>',
				data : {listing_id : listing_id},
				success : function(response) {
					if (response == 'added') {
						$(elem).html('<i class="fas fa-heart"></i>');
						toastr.success('Added to wishlist');
					}else {
						$(elem).html('<i class="far fa-heart"></i>');
						toastr.success('Removed from the wishlist');
					}
				}
			});
		}else {
			loginAlert();
		}
	}


	function showToggle(elem, selector) {
		$('.'+selector).slideToggle();
		console.log($(elem).text());
		if($(elem).text() === "show_more")
    {
        $(elem).text('show less');
    }
    else
    {
        $(elem).text('show more');
    }
	}
</script>

<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'js/frontend/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<script>
	createListingsMap({
			mapId: 'categorySideMap',
			jsonFile: '{{ asset('js/frontend/map/listing-geojson.json') }}'
	});
</script>
<script>
	function toggleListingView(type) {
		$.ajax({
			url:'/listings'+type,
			success: function(response){
				location.reload();
			}
		});
	}
</script>