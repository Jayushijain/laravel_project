<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Category;
use App\City;
use App\Country;
use App\Listing;
use App\User;
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
		//
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

		return $cities;
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
