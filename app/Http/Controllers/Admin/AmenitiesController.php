<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AmenitiesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$amenities               = Amenity::all();
		$page_info['page_title'] = 'Amenities';
		$page_info['page_name']  = 'amenities';

		return view('backend.admin.amenities.index', compact('amenities', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$page_info['page_title'] = 'Add New Amenity';
		$page_info['page_name']  = 'add_amenity';

		return view('backend.admin.amenities.create', compact('page_info'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input   = $request->all();
		$amenity = Amenity::create($input);
		$amenity->save();

		if ($amenity)
		{
			Session::flash('success_message', 'Amenity Created');
		}
		else
		{
			Session::flash('error_message', 'Amenity not Created');
		}

		return redirect('/admin/amenities');
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$amenity                 = Amenity::findOrFail($id);
		$page_info['page_title'] = 'Update Amenity';
		$page_info['page_name']  = 'edit_amenity';

		return view('backend.admin.amenities.edit', compact('amenity', 'page_info'));
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
		$amenity = Amenity::findOrFail($id);
		$input   = $request->all();
		$amenity->update($input);

		if ($amenity)
		{
			Session::flash('success_message', 'Amenity Updated');
		}
		else
		{
			Session::flash('error_message', 'Amenity not Updated');
		}

		return redirect('/admin/amenities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$amenity = Amenity::findOrFail($id);

		if ($amenity->delete())
		{
			Session::flash('success_message', 'Amenity Deleted');
		}
		else
		{
			Session::flash('error_message', 'Amenity not Deleted');
		}

		return redirect('/admin/amenities');
	}
}
