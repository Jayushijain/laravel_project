<?php

/**
 * Display the frontend settings
 *
 * @param  string $type  setting_type
 *
 * @return  description
 */
function frontend_system_setting($type = '')
{
    $settings = DB::table('frontend_settings')->where('type', $type)->first();
    
	return $settings->description;
}


/**
 * Display the frontend settings
 *
 * @param  string $type  setting_type
 *
 * @return  description
 */
function get_key($value = '')
{
    $new_value = ucwords(str_replace('_'," ",$value));
    
	return $new_value;
}

    /**
     * Display The our System setting
     *
     * @param   string  $type  settingtype
     *
     * @return  description
     */
    function get_settings($type = '')
    {
        $settings = DB::table('settings')->where('type', $type)->first();
        
        return $settings->description;
    }

/**
 * Display our Frontend setting
 *
 * @param   string  $type setting type
 * @return  description
 */

if (!function_exists('get_frontend_settings'))
{
	function get_frontend_settings($type = '')
	{
		$settings = DB::table('frontend_settings')->where('type', $type)->first();

		return $settings->description;
	}
}

/**
 * Now open listing in this time
 *
 * @param   int $listing_id
 *
 * @return  bolean
 */
	function now_open($listing_id)
	{
		$time_configurations          = DB::table('time_configurations')->where('listing_id', $listing_id)->first();
		$today                        = strtolower(date('l'));
		$current_hour                 = date('H');
		$time_configuration_for_today = explode('-', $time_configurations->$today);

		if ($time_configuration_for_today[0] == 'closed' || $time_configuration_for_today[1] == 'closed')
		{
			return 'Closed';
		}
		else
		{
			if ($time_configuration_for_today[0] <= $current_hour && $time_configuration_for_today[1] >= $current_hour)
			{
				return 'Now Open';
			}
			else
			{
				return 'Closed';
			}
		}
	}

/**
 * check how many rating in this listiing count
 *
 * @param   int  $listing_id
 *
 * @return  int count(avg rating)
 */
	function get_listing_wise_rating($listing_id)
	{
		$rating = DB::table('reviews')->where('listing_id', $listing_id)->avg('review_rating');
		// $reviews = DB::table('reviews')->where('listing_id', $listing_id)->count();

		return $rating;
	}

/**
 * check how many review in this listing
 *
 * @param   int  $listing_id
 *
 * @return  int count(how many review give)
 */
	function get_listing_wise_review($listing_id)
	{
		$reviews = DB::table('reviews')->where('listing_id', $listing_id)->count();

		return $reviews;
	}

/**
 * check the avg rating and define quality of listing
 *
 * @param   int  $listing_id
 *
 * @return  string   return review quality
 */
	function get_rating_wise_quality($listing_id)
	{
		$qu = DB::table('review_wise_qualities')->where('rating_to', '>=', get_listing_wise_rating($listing_id))->first();

		return $qu;
	}

	if (!function_exists('sanitizer'))
	{
		function sanitizer($string = '')
		{
			$sanitized_string = htmlspecialchars($string);

			return $sanitized_string;
		}
	}

	function get_percentage_of_specific_rating($listing_id = '', $rating = '')
	{
		$total_number_of_reviewers                    = get_listing_wise_review($listing_id);
		$total_number_of_reviewers_of_specific_rating = DB::table('reviews')->where(['listing_id' => $listing_id, 'review_rating' => $rating])->count();

		if ($total_number_of_reviewers_of_specific_rating > 0)
		{
			$percentage = ($total_number_of_reviewers_of_specific_rating / $total_number_of_reviewers) * 100;
		}
		else
		{
			$percentage = 0;
		}

		return floor($percentage);
	}

/**
 * Check which type of currency and then find the symbol
 *
 * @return  [type]  symbol of currency
 */

	if (!function_exists('currency'))
	{
		function currency($price = '')
		{
			if ($price != '')
			{
				$currency      = DB::table('settings')->where('type', 'system_currency')->first();
				$currency_code = $currency->description;

				$symbolfind = DB::table('currencies')->where('code', $currency_code)->first();
				$symbol     = $symbolfind->symbol;

				$positionfind = DB::table('settings')->where('type', 'currency_position')->first();
				$position     = $positionfind->description;

				if ($position == 'right')
				{
					return $price.$symbol;
				}
				elseif ($position == 'right-space')
				{
					return $price.' '.$symbol;
				}
				elseif ($position == 'left')
				{
					return $symbol.$price;
				}
				elseif ($position == 'left-space')
				{
					return $symbol.' '.$price;
				}
			}
		}
	}


/**
 * Count sub category
 *
 * @param   int  $category_id
 *
 * @return  int  return category_number
 */
	function count_sub_category($category_id)
	{
		$sub_category = DB::table('categories')->where('parent_id', $category_id)->count();

		return $sub_category;
	}

/***
 * get sub category
 */
	function get_sub_category($category_id)
	{
		$sub_category = DB::table('categories')->where('parent_id', $category_id)->get();

		return $sub_category;
	}

/**
 * Get city name
 *
 * @param   int  $city_id
 *
 * @return  string return city name
 */
	function get_city($city_id)
	{
		$city = DB::table('cities')->where('id', $city_id)->first();

		return $city->name;
	}

/**
 * Get country name
 *
 * @param   int  $country_id
 *
 * @return  int return country name
 */
	function get_country($country_id)
	{
		$country = DB::table('countries')->where('id', $country_id)->first();

		return $country->name;
	}

	if (!function_exists('is_wishlisted'))
	{
		function is_wishlisted($listing_id = '')
		{
			if (Auth::check())
			{
				$user_details = DB::table('users')->where('id', Auth::user()->id)->first();

// $user_details = $CI->db->get_where('user', array('id' => $CI->session->userdata('user_id')))->row_array();
				if ($user_details->wishlists != '')
				{
					$wishlists = json_decode($user_details['wishlists']);
					if (in_array($listing_id, $wishlists))
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}
				else
				{
					return 1;
				}
			}
			else
			{
				return false;
			}
		}
	}

	if (!function_exists('slugify'))
	{
		function slugify($text)
		{
			$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
			$text = trim($text, '-');
			$text = strtolower($text);

  if (! function_exists('is_wishlisted')) {
    function is_wishlisted($listing_id = '') {
      
        if (Auth::check()) 
        {
            $user_details = DB::table('users')->where('id', Auth::user()->id)->first();
            // $user_details = $CI->db->get_where('user', array('id' => $CI->session->userdata('user_id')))->row_array();
            if ($user_details->wishlists != "") 
            {
                $wishlists = json_decode($user_details->wishlists);
                if (in_array($listing_id, $wishlists)) 
                {
                return 1;
                }
                else 
                {
                return 0;
                }
            }
            else 
            {
            return 1;
            }
        }
        else
        {
          return false;
        }
    }
  }

//$text = preg_replace('~[^-\w]+~', '', $text);
			if (empty($text))
			{
				return 'n-a';
			}

			return $text;
		}
	}

	if (!function_exists('get_listing_url'))
	{
		function get_listing_url($listing_id = '')
		{
			$listing = DB::table('listings')->where('id', $listing_id)->first();
			// $listing = $CI->db->get_where('listing', array('id' => $listing_id))->row_array();
			$custom_url = $listing->listing_type.'/'.slugify($listing->name).'/'.$listing_id;

			return $custom_url;
		}
	}

	/**
 * Check which type of currency
 *
 * @return  [type]  return symbol and currency code
 */

	if (!function_exists('currency_code_and_symbol'))
	{
		$currency      = DB::table('settings')->where('type', 'system_currency')->first();
		$currency_code = $currency->description;
		$symbolfind = DB::table('currencies')->where('code', $currency_code)->first();
		$symbol     = $symbolfind->symbol;

		function currency_code_and_symbol($type = '')
		{
			$currency      = DB::table('settings')->where('type', 'system_currency')->first();
			$currency_code = $currency->description;

			$symbolfind = DB::table('currencies')->where('code', $currency_code)->first();
			$symbol     = $symbolfind->symbol;


			if ($type == '')
			{
				return $symbol;
			}
			else
			{
				return $currency_code;
			}
		}
	}


	// if (!function_exists('currency_code_and_symbol'))
	// {
	// 	function currency_code_and_symbol($type = '')
	// 	{
	// 		$currency_code = DB::table('settings')->where('type', 'system_currency')->first();

	// 		$symbol = DB::table('currency')->where('code', $currency_code)->pluck('symbol');

	// 		if ($type == '')
	// 		{
	// 			return $symbol;
	// 		}
	// 		else
	// 		{
	// 			return $currency_code;
	// 		}
	// 	}
	// }

/**
 * To get photo for the particular user.
 *
 * @param   int  $user_id
 * @return  path to the file
 */
	function get_photo($user_id)
	{
		if (is_file(public_path().'/uploads/user_image/'.$user_id.'jpg'))
		{
			return asset('/uploads/user_image/'.$user_id.'jpg');
		}
		else
		{
			return asset('/uploads/user_image/user.png');
		}
	}

        

    function get_opening_time($listing_id = "")
    {
        $timeconfig = DB::table('time_configurations')->where('listing_id', $listing_id)->first();
        return $timeconfig;
    }
    
    function claiming_status($listing_id = "")
    {
        $claiming_status = DB::table('claimed_listings')->where('listing_id', $listing_id)->value('status');
        return $claiming_status;
    }

    function get_role($user_id = "")
    {
        $role = DB::table('users')->where('id', $user_id)->first();
        return $role->role_id;
    }

    function get_category_name($categories = "")
    {
        $categories = DB::table('categories')->where('id', $categories)->first();
        return $categories->name;
    }

    function get_amenity_name($amenity = "")
    {
        $amenity = DB::table('amenities')->where('id', $amenity)->first();
        return $amenity->name;
    }

    function get_food_menus($listing_id = "")
    {
        $food_menus = DB::table('food_menus')->where('listing_id', $listing_id)->get();
        return $food_menus;
    }


    function get_hotel_rooms($listing_id = "")
    {
        $hotel_rooms = DB::table('hotel_room_specifications')->where('listing_id', $listing_id)->get();
        return $hotel_rooms;
    }

    function get_beauty($listing_id = "")
    {
        $beauty_services = DB::table('beauty_services')->where('listing_id', $listing_id)->get();
        return $beauty_services;
    }

    function get_shop_product($listing_id = "")
    {
        $products = DB::table('product_details')->where('listing_id', $listing_id)->get();
        return $products;
    }

    function search_listing($search_string = '', $selected_category_id = '') {
        if ($search_string != "" || $selected_category_id != "") {
            $search = DB::table('listings')->where('name', 'like', $search_string)->get();
            $search = DB::table('categories')->where('id', $selected_category_id)->get();
            return $search;
            // $this->db->like('name', $search_string);
            // $this->db->or_like('description', $search_string);
        }

        // if ($selected_category_id != "") {
        //     return $search = DB::table('categories')->where('id', $selected_category_id)->get();
        //     // $this->db->like('categories', "$selected_category_id");
        // }

        // $this->db->order_by('is_featured', 'desc');

        // $this->db->where('status', 'active');
        // return  $this->db->get('listing')->result_array();
    }

?>
