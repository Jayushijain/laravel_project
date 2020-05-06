<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CitiesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$cities                  = City::all();
		$page_info['page_title'] = 'Cities';
		$page_info['page_name']  = 'cities';

		return view('backend.admin.cities.index', compact('cities', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$countries               = Country::all();
		$page_info['page_title'] = 'Add City';
		$page_info['page_name']  = 'add_city';

		return view('backend.admin.cities.create', compact('countries', 'page_info'));
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
		$city  = City::create($input);
		$city->save();

		if ($city)
		{
			Session::flash('success_message', 'City Created');
		}
		else
		{
			Session::flash('error_message', 'City not Created');
		}

		return redirect('/admin/cities');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$city                    = City::findOrFail($id);
		$countries               = Country::all();
		$page_info['page_title'] = 'Update City';
		$page_info['page_name']  = 'edit_city';

		return view('backend.admin.cities.edit', compact('countries', 'page_info', 'city'));
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
		$city  = City::findOrFail($id);
		$input = $request->all();

		if ($city->update($input))
		{
			Session::flash('success_message', 'City Updated');
		}
		else
		{
			Session::flash('error_message', 'City not Updated');
		}

		return redirect('/admin/cities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$city = City::findOrFail($id);

		if ($city->delete())
		{
			Session::flash('success_message', 'City Deleted');
		}
		else
		{
			Session::flash('error_message', 'City not Deleted');
		}

		return redirect('/admin/cities');
	}
}
