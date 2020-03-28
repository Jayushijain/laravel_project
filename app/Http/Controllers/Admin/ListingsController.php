<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Category;
use App\City;
use App\Country;
use App\Listing;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
		$users                   = User::all();
		$listings                = Listing::all();
		$page_info['page_title'] = 'Listings';
		$page_info['page_name']  = 'listings';

		return view('backend.admin.listings.index', compact('users', 'listings', 'page_info'));
	}

	public function filter_listing_table(Request $request)
	{
		//return $request->status;
		$listing = Listing::query();
		$listing->when(request('status') != 2, function ($condition)
		{
			return $condition->where('status', request('status'));
		});

		$listing->when(request('user_id') != 'all', function ($condition)
		{
			return $condition->where('user_id', request('user_id'));
		});

		$listings = $listing->get();

		$users                   = User::all();
		$page_info['page_title'] = 'Listings';
		$page_info['page_name']  = 'listings';
		$status                  = $request->status;
		$user_id                 = $request->user_id;

		return view('backend.admin.listings.index', compact('users', 'listings', 'page_info', 'status', 'user_id'));
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

		return view('backend.admin.listings.create', compact('countries', 'categories','amenities', 'page_info'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$photo_gallery = [];
		if($request->is_featured)
		{
			$input['is_featured'] = sanitizer($request->is_featured);
		}
		else
		{
			$input['is_featured'] = sanitizer(0);
		}

		if(sizeof($request->amenity_id)>0)
		{
			$input['amenity_id'] = implode(',',$request->amenity_id);
		}
		else
		{
			$input['amenity_id'] = $request->amenity_id;
		}

		if(sizeof($request->category_id)>0)
		{
			$input['category_id'] = implode(',',$request->category_id);
		}
		else
		{
			$input['category_id'] = $request->category_id;
		}

		$input['user_id'] = Auth::user()->id;
		$social_links = array(
		    'facebook' => sanitizer($request->facebook),
		    'twitter'  => sanitizer($request->twitter),
		    'linkedin' => sanitizer($request->linkedin),
		  );
  		$input['social'] = json_encode($social_links);

  		$time_config = array();
	  	$days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
	  	foreach ($days as $day) {
	    $time_config[$day] = sanitizer($this->input->post($day.'_opening')).'-'.sanitizer($this->input->post($day.'_closing'));
	  }

		if ($file = $request->file('listing_thumbnail'))
        {
        	$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_thumbnail', $filename);
        }

        if ($file = $request->file('listing_cover'))
        {
        	$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_cover_photo', $filename);
        }

        foreach ($request->file('listing_images') as $listing_image) 
        {
        	if ($file = $listing_image)
        	{
        		$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            	$temp = $file->move('uploads/listing_image', $filename);
            	array_push($photo_gallery,$temp);
        	}	
        }
        
        $input['photos'] = json_decode($photo_gallery);
        $input['code'] = md5(rand(10000000, 20000000));

        if(Auth::user()->role == 'admin')
        {
        	$input['status'] = 1;
        }
        else
        {
        	$input['status'] = 0;
        }

        echo "<PRE>";
		return $input;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * To get the cities for single country
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function get_cities(Request $request)
	{
		//$country = Country::where($request->country_id);
		$cities = City::where('country_id', $request->country_id)->get();
		$arr = [];
		foreach ($cities as $city) 
		{
			$arr.push($city);
		}	
		
		return $arr;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

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

		return redirect('admin/listings');
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
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
