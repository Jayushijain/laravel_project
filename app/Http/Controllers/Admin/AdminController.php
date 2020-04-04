<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Listing;
use App\PackagePurchasedHistory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$chart_data['number_of_active_listing']  = 0;
		$chart_data['number_of_pending_listing'] = 0;
		$listings                                = Listing::all();

		foreach ($listings as $key => $listing)
		{
			if ($listing['status'] == 'active')
			{
				$chart_data['number_of_active_listing']++;
			}

			if ($listing['status'] != 'active')
			{
				$chart_data['number_of_pending_listing']++;
			}
		}

		// Package expiration in this month
		$chart_data['current_date_time']        = strtotime(date('d-m-Y 00:00:00'));
		$chart_data['first_day_this_month']     = strtotime(date('01-m-Y').' 00:00:00'); // hard-coded '01' for first day
		$chart_data['last_day_this_month']      = strtotime(date('t-m-Y').' 00:00:00');
		$chart_data['expiration_in_this_month'] = PackagePurchasedHistory::where([
			['expired_date', '>=', $chart_data['first_day_this_month']],
			['expired_date', '<=', $chart_data['last_day_this_month']]
		])->get();

		$page_info['page_title'] = 'Dashboard';
		$page_info['page_name']  = 'dashboard';

		return view('backend.index', compact('chart_data', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($edit_type,$id)
	{
		$admin = User::findOrFail($id);
		$page_info['page_title'] = 'Manage Profile';
		$page_info['page_name']  = 'edit_profile';

		return view("backend.admin.edit",compact('admin','page_info'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,$edit_type, $id)
	{		
		$admin = User::findOrFail($id);

		if($edit_type == 'manage_profile')
		{	
			$input = $request->all();
			$input['email'] = sanitizer($request->email);
	        $input['name'] = sanitizer($request->name);
	        $input['address'] = sanitizer($request->address);
	        $input['phone'] = sanitizer($request->phone);
	        $input['website'] = sanitizer($request->website);
	        $input['about'] = sanitizer($request->about);
	        $social_links = array(
	            'facebook' => sanitizer($request->facebook),
	            'twitter' => sanitizer($request->twitter),
	            'linkedin' => sanitizer($request->linkedin),
	        );
	        $input['social'] = json_encode($social_links);

	        if ($file = $request->file('user_image'))
	        {
	            $filename = $id.'.jpg';
	            $file->move('uploads/user_image', $filename);
	        }		
			$admin->update($input);
			Session::flash('success_message', 'Profile Updated');
		}
		else if($edit_type == 'change_password')
		{
			$input['password'] = bcrypt($request->password);
			$admin->update($input);
			Session::flash('success_message', 'Password Changed');
		}

		$page_info['page_title'] = 'Manage Profile';
		$page_info['page_name']  = 'edit_profile';

		return view("backend.admin.edit",compact('admin','page_info'));
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
