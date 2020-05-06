<?php

namespace App\Http\Controllers\User;

use App\Amenity;
use App\Category;
use App\Country;
use App\Http\Controllers\Controller;
use App\Listing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListingsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//return "hii";
		$listings                = Listing::where('user_id', Auth::user()->id)->get();
		$page_info['page_title'] = 'Listings';
		$page_info['page_name']  = 'listings';

		return view('backend.user.listings.index', compact('listings', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$countries               = Country::all();
		$categories              = Category::all();
		$amenities               = Amenity::all();
		$page_info['page_title'] = 'Add New Listing';
		$page_info['page_name']  = 'add_listing';

		return view('backend.user.listings.create', compact('countries', 'categories', 'amenities', 'page_info'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input         = $request->all();
		$photo_gallery = [];

		if ($request->is_featured)
		{
			$input['is_featured'] = sanitizer($request->is_featured);
		}
		else
		{
			$input['is_featured'] = sanitizer(0);
		}

		if (sizeof($request->amenity_id) > 0)
		{
			$input['amenity_id'] = implode(',', $request->amenity_id);
		}
		else
		{
			$input['amenity_id'] = $request->amenity_id;
		}

		if (sizeof($request->category_id) > 0)
		{
			$input['category_id'] = implode(',', $request->category_id);
			array_pop($input['category_id']);
		}
		else
		{
			$input['category_id'] = $request->category_id;
		}

		$input['user_id'] = Auth::user()->id;
		$social_links     = array(
			'facebook' => sanitizer($request->facebook),
			'twitter'  => sanitizer($request->twitter),
			'linkedin' => sanitizer($request->linkedin)
		);
		$input['social'] = json_encode($social_links);

		$time_config = array();
		$days        = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');

		foreach ($days as $day)
		{
			$time_config[$day] = sanitizer($request->$day.'_opening').'-'.sanitizer($request->$day.'_closing');
		}

		if ($file = $request->file('listing_thumbnail'))
		{
			$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
			$file->move('uploads/listing_thumbnails', $filename);
			$input['listing_thumbnail'] = $filename;
		}

		if ($file = $request->file('listing_cover'))
		{
			$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
			$file->move('uploads/listing_cover_photo', $filename);
			$input['listing_cover'] = $filename;
		}

		foreach ($request->file('listing_images') as $listing_image)
		{
			if ($file = $listing_image)
			{
				$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
				$file->move('uploads/listing_images', $filename);
				array_push($photo_gallery, $filename);
			}
		}

		$input['photos'] = json_encode($photo_gallery);
		$input['code']   = md5(rand(10000000, 20000000));

		if (Auth::user()->role_id == 1)
		{
			$input['status'] = 1;
		}
		else
		{
			$input['status'] = 0;
		}

		$listing                   = Listing::create($input);
		$time_config['listing_id'] = $listing->id;
		$time_configuration        = TimeConfiguration::create($time_config);
		(new ListingsController())->store_listing_type_wise($request->listing_type, $listing->id, $request);

		if ($listing)
		{
			Session::flash('success_message', 'Listing Created');
		}
		else
		{
			Session::flash('error_message', 'Listing not Created');
		}

		return redirect('user/user_listings');
	}

	/**
	 * It will store the listing information depending on its type.
	 *
	 * @param  string                    $listing_type [listing type name]
	 * @param  integer                   $listing_id   [id of the listing]
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function store_listing_type_wise($listing_type, $listing_id, Request $request)
	{
		$listing_photos = array();

		if ($listing_type == 'hotel')
		{
			$room_name_array = $request->room_name;
			array_pop($room_name_array);
			$room_description_array = $request->room_description;
			array_pop($room_description_array);
			$room_price_array = $request->room_price;
			array_pop($room_price_array);
			$hotel_room_amenities_array = $request->hotel_room_amenities;
			array_pop($hotel_room_amenities_array);

			foreach ($request->file('room_image') as $room_image)
			{
				if ($file = $room_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/hotel_room_images', $filename);
					array_push($listing_photos, $filename);
				}
			}

			foreach ($room_name_array as $key => $room_name)
			{
				$input['name']            = sanitizer($room_name);
				$input['description']     = sanitizer($room_description_array[$key]);
				$input['price']           = sanitizer($room_price_array[$key]);
				$input['amenities']       = sanitizer($hotel_room_amenities_array[$key]);
				$input['photo']           = (isset($listing_photos[$key])) ? sanitizer($listing_photos[$key]) : '';
				$input['listing_id']      = $listing_id;
				$hotel_room_specification = HotelRoomSpecification::create($input);
			}
		}
		elseif ($listing_type == 'restaurant')
		{
			$menu_name_array = $request->menu_name;
			array_pop($menu_name_array);
			$menu_items_array = $request->items;
			array_pop($menu_items_array);
			$menu_price_array = $request->menu_price;
			array_pop($menu_price_array);

			foreach ($request->file('menu_image') as $menu_image)
			{
				if ($file = $menu_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/restaurant_menu_images', $filename);
					array_push($listing_photos, $filename);
				}
			}

			foreach ($menu_name_array as $key => $menu_name)
			{
				$input['name']       = sanitizer($menu_name);
				$input['price']      = sanitizer($menu_price_array[$key]);
				$input['items']      = sanitizer($menu_items_array[$key]);
				$input['photo']      = sanitizer($listing_photos[$key]);
				$input['listing_id'] = sanitizer($listing_id);
				$food_menu           = FoodMenu::create($input);
			}
		}
		elseif ($listing_type == 'beauty')
		{
			$service_name_array = $request->service_name;
			array_pop($service_name_array);

			$service_starting_time_array = $request->starting_time;
			array_pop($service_starting_time_array);

			$service_ending_time_array = $request->ending_time;
			array_pop($service_ending_time_array);

			$service_duration_array = $request->duration;
			array_pop($service_duration_array);

			$service_price_array = $request->service_price;
			array_pop($service_price_array);

			foreach ($request->file('service_image') as $service_image)
			{
				if ($file = $service_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/beauty_service_images', $filename);
					array_push($listing_photos, $filename);
				}
			}

			foreach ($service_name_array as $key => $service_name)
			{
				$input['name']          = sanitizer($service_name);
				$input['price']         = sanitizer($service_price_array[$key]);
				$input['service_times'] = sanitizer($service_starting_time_array[$key]).','.sanitizer($service_ending_time_array[$key]).','.sanitizer($service_duration_array[$key]);
				$input['photo']         = sanitizer($listing_photos[$key]);
				$input['listing_id']    = sanitizer($listing_id);
				$beauty_service         = BeautyService::create($input);
			}
		}
		elseif ($listing_type == 'shop')
		{
			$product_name_array = $request->product_name;
			array_pop($product_name_array);
			$product_variants_array = $request->variants;
			array_pop($product_variants_array);
			$product_price_array = $request->product_price;
			array_pop($product_price_array);

			foreach ($request->file('product_image') as $product_image)
			{
				if ($file = $product_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/product_images', $filename);
					array_push($listing_photos, $filename);
				}
			}

			foreach ($product_name_array as $key => $product_name)
			{
				$input['name']       = sanitizer($product_name);
				$input['variant']    = sanitizer($product_variants_array[$key]);
				$input['price']      = sanitizer($product_price_array[$key]);
				$input['photo']      = sanitizer($listing_photos[$key]);
				$input['listing_id'] = sanitizer($listing_id);
				$product_detail      = ProductDetail::create($input);
			}
		}
	}

	/**
	 * To update the value of single column
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  integer                   $id      [id of the row that has to be updated]     *
	 * @return \Illuminate\Http\Response
	 */
	public function update_column(Request $request, $id)
	{
		$value = Listing::where('id', $id)->value($request->column);

		if ($value == 0)
		{
			$input[$request->column] = 1;
		}
		else
		{
			$input[$request->column] = 0;
		}

		$listing = Listing::findOrFail($id)->update($input);

		if ($listing)
		{
			Session::flash('success_message', 'Listing Updated');
		}
		else
		{
			Session::flash('error_message', 'Listing not Updated');
		}

		return redirect('user/user_listings');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$listing                 = Listing::findOrFail($id);
		$countries               = Country::all();
		$categories              = Category::all();
		$amenities               = Amenity::all();
		$page_info['page_title'] = 'Listing Edit';
		$page_info['page_name']  = 'edit_listing';

		return view('backend.user.listings.edit', compact('listing', 'countries', 'categories', 'amenities', 'page_info'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$input         = $request->all();
		$listing       = Listing::findOrFail($id);
		$photo_gallery = [];

		if ($request->is_featured)
		{
			$input['is_featured'] = sanitizer($request->is_featured);
		}
		else
		{
			$input['is_featured'] = sanitizer(0);
		}

		if (sizeof($request->amenity_id) > 0)
		{
			$input['amenity_id'] = implode(',', $request->amenity_id);
		}
		else
		{
			$input['amenity_id'] = $request->amenity_id;
		}

		if (sizeof($request->category_id) > 0)
		{
			$input['category_id'] = implode(',', $request->category_id);
			//array_pop($input['category_id']);
		}
		else
		{
			$input['category_id'] = $request->category_id;
		}

		$input['user_id'] = Auth::user()->id;
		$social_links     = array(
			'facebook' => sanitizer($request->facebook),
			'twitter'  => sanitizer($request->twitter),
			'linkedin' => sanitizer($request->linkedin)
		);
		$input['social'] = json_encode($social_links);

		$time_config = array();
		$days        = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');

		foreach ($days as $day)
		{
			$time_config[$day] = sanitizer($request->$day.'_opening').'-'.sanitizer($request->$day.'_closing');
		}

		if ($request->file('listing_thumbnail') != '')
		{
			if ($file = $request->file('listing_thumbnail'))
			{
				$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
				$file->move('uploads/listing_thumbnails', $filename);
				$input['listing_thumbnail'] = $filename;
			}
		}
		else
		{
			$input['listing_thumbnail'] = $listing->listing_thumbnail;
		}

		if ($request->file('listing_thumbnail') != '')
		{
			if ($file = $request->file('listing_cover'))
			{
				$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
				$file->move('uploads/listing_cover_photo', $filename);
				$input['listing_cover'] = $filename;
			}
		}
		else
		{
			$input['listing_cover'] = $listing->listing_cover;
		}

		$old_listing_images = json_decode($request->photos);
		$new_listing_images = $request->new_listing_images;
		$listing_images     = $request->file('listing_images');
		unset($new_listing_images[count($new_listing_images) - 1]);
		$final_listing_images = array();

		if (!empty($old_listing_images))
		{
			foreach ($listing_images as $key => $listing_image)
			{
				if (in_array($new_listing_images[$key], $old_listing_images))
				{
					if ($file = $listing_image)
					{
						$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
						$file->move('uploads/listing_images', $filename);
						array_push($photo_gallery, $filename);
					}
					else
					{
						$filename = $new_listing_images[$key];
						array_push($photo_gallery, $filename);
					}
				}
				else
				{
					if ($file = $listing_image)
					{
						$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
						$file->move('uploads/listing_images', $filename);
						array_push($photo_gallery, $filename);
					}
				}
			}
		}
		else
		{
			if ($request->file('listing_images'))
			{
				foreach ($request->file('listing_images') as $listing_image)
				{
					if ($file = $listing_image)
					{
						$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
						$file->move('uploads/listing_images', $filename);
						array_push($photo_gallery, $filename);
					}
				}
			}
		}

		$input['photos'] = json_encode($photo_gallery);
		$input['code']   = md5(rand(10000000, 20000000));

		if (Auth::user()->role_id == 1)
		{
			$input['status'] = 1;
		}
		else
		{
			$input['status'] = 0;
		}

		if ($listing->update($input))
		{
			$time_config['listing_id'] = $listing->id;
			$time_configuration        = TimeConfiguration::where('listing_id', $listing->id)->update($time_config);
			(new ListingsController())->update_listing_type_wise($request->listing_type, $listing->id, $request);
			//(new ListingsController())->remove_from_other_tables($request->listing_type, $listing->id);
			Session::flash('success_message', 'Listing Updated');
		}
		else
		{
			Session::flash('error_message', 'Listing not Updated');
		}

		return redirect('user/user_listings');
	}

	/**
	 * [to update the tables depending on listing type]
	 *
	 * @param  string  $listing_type [type of listing]
	 * @param  string  $listing_id   [id of listing]
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update_listing_type_wise($listing_type = '', $listing_id = '', Request $request)
	{
		$listing_photos = array();

// Updating listing wise image and data saving.
		if ($listing_type == 'hotel')
		{
			$room_name_array = $request->room_name;
			array_pop($room_name_array);
			$room_description_array = $request->room_description;
			array_pop($room_description_array);
			$room_price_array = $request->room_price;
			array_pop($room_price_array);
			$hotel_room_amenities_array = $request->hotel_room_amenities;
			array_pop($hotel_room_amenities_array);
			$hotel_room_ids_array = $request->hotel_room_id;
			array_pop($hotel_room_ids_array);

			// Image Uploading functions starts here
			$old_hotel_room_images = $request->old_hotel_room_images;
			array_pop($old_hotel_room_images);

// Image Uploading functions ends here

			foreach ($request->file('room_image') as $key => $room_image)
			{
				if ($file = $room_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/hotel_room_images', $filename);
					array_push($listing_photos, $filename);
				}
				else
				{
					array_push($listing_photos, $old_hotel_room_images[$key]);
				}
			}

			foreach ($hotel_room_ids_array as $key => $hotel_room_id)
			{
				$input['name']        = sanitizer($room_name_array[$key]);
				$input['description'] = sanitizer($room_description_array[$key]);
				$input['price']       = sanitizer($room_price_array[$key]);
				$input['amenities']   = sanitizer($hotel_room_amenities_array[$key]);
				$input['photo']       = sanitizer($listing_photos[$key]);
				$input['listing_id']  = sanitizer($listing_id);

				if ($hotel_room_id > 0)
				{
					$hotel_room = App\HotelRoomSpecification::findOrFail($hotel_room_id)->update($input);
				}
				else
				{
					$hotel_room = App\HotelRoomSpecification::insert($input);
				}
			}
		}
		else if ($listing_type == 'restaurant')
		{
			$menu_name_array = sanitizer($request->menu_name);
			array_pop($menu_name_array);
			$menu_items_array = sanitizer($request->items);
			array_pop($menu_items_array);
			$menu_price_array = sanitizer($request->menu_price);
			array_pop($menu_price_array);
			$menu_ids_array = sanitizer($request->food_menu_id);
			array_pop($menu_ids_array);

			// Image Uploading functions starts here
			$old_food_menu_images = sanitizer($request->old_food_menu_images);
			array_pop($old_food_menu_images);

// Image Uploading functions ends here

			foreach ($request->file('menu_image') as $key => $menu_image)
			{
				if ($file = $menu_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/restaurant_menu_images', $filename);
					array_push($listing_photos, $filename);
				}
				else
				{
					array_push($listing_photos, $old_food_menu_images[$key]);
				}
			}

			foreach ($menu_ids_array as $key => $menu_id)
			{
				$input['name']       = sanitizer($menu_name_array[$key]);
				$input['price']      = sanitizer($menu_price_array[$key]);
				$input['items']      = sanitizer($menu_items_array[$key]);
				$input['photo']      = sanitizer($listing_photos[$key]);
				$input['listing_id'] = sanitizer($listing_id);
				if ($menu_id > 0)
				{
					$food_menu = App\FoodMenu::findOrFail($menu_id)->update($input);
				}
				else
				{
					$food_menu = App\FoodMenu::insert($input);
				}
			}
		}
		elseif ($listing_type == 'beauty')
		{
			$service_name_array = $request->service_name;
			array_pop($service_name_array);

			$service_starting_time_array = $request->starting_time;
			array_pop($service_starting_time_array);

			$service_ending_time_array = $request->ending_time;
			array_pop($service_ending_time_array);

			$service_duration_array = $request->duration;
			array_pop($service_duration_array);

			$service_price_array = $request->service_price;
			array_pop($service_price_array);
			$service_ids_array = $request->beauty_service_id;
			array_pop($service_ids_array);

			// Image Uploading functions starts here
			$old_beauty_service_images = $request->old_beauty_service_images;
			array_pop($old_beauty_service_images);

// Image Uploading functions ends here

			foreach ($request->file('service_image') as $key => $service_image)
			{
				if ($file = $service_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/beauty_service_images', $filename);
					array_push($listing_photos, $filename);
				}
				else
				{
					array_push($listing_photos, $old_beauty_service_images[$key]);
				}
			}

			foreach ($service_ids_array as $key => $service_id)
			{
				$input['name']          = sanitizer($service_name_array[$key]);
				$input['price']         = sanitizer($service_price_array[$key]);
				$input['service_times'] = sanitizer($service_starting_time_array[$key]).','.sanitizer($service_ending_time_array[$key]).','.sanitizer($service_duration_array[$key]);
				$input['photo']         = sanitizer($listing_photos[$key]);
				$input['listing_id']    = sanitizer($listing_id);
				if ($service_id > 0)
				{
					$beauty_service = App\BeautyService::findOrFail($service_id)->update($input);
				}
				else
				{
					$beauty_service = App\BeautyService::insert($input);
				}
			}
		}
		elseif ($listing_type == 'shop')
		{
			$product_name_array = $request->product_name;
			array_pop($product_name_array);
			$product_variants_array = $request->variants;
			array_pop($product_variants_array);
			$product_price_array = $request->product_price;
			array_pop($product_price_array);
			$product_ids_array = $request->product_id;
			array_pop($product_ids_array);

			// Image Uploading functions starts here
			$old_product_images = $request->old_product_images;
			array_pop($old_product_images);

// Image Uploading functions ends here

			foreach ($request->file('product_image') as $key => $product_image)
			{
				if ($file = $product_image)
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/product_images', $filename);
					array_push($listing_photos, $filename);
				}
				else
				{
					array_push($listing_photos, $old_product_images[$key]);
				}
			}

			foreach ($product_ids_array as $key => $product_id)
			{
				$input['name']       = sanitizer($product_name_array[$key]);
				$input['variant']    = sanitizer($product_variants_array[$key]);
				$input['price']      = sanitizer($product_price_array[$key]);
				$input['photo']      = sanitizer($listing_photos[$key]);
				$input['listing_id'] = sanitizer($listing_id);
				if ($product_id > 0)
				{
					$product_detail = App\ProductDetail::findOrFail($product_id)->update($input);
				}
				else
				{
					$product_detail = App\ProductDetail::insert($input);
				}
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$listing = Listing::findOrFail($id);

		if ($listing->delete())
		{
			Session::flash('success_message', 'Listing Deleted');
		}
		else
		{
			Session::flash('error_message', 'Listing not Deleted');
		}

		return redirect('user/user_listings');
	}
}
