<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ReviewWiseQuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewWiseQualitiesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$qualities               = ReviewWiseQuality::all();
		$page_info['page_title'] = 'Rating Wise Quality';
		$page_info['page_name']  = 'rating_wise_quality';

		return view('backend.admin.review_wise_ratings.index', compact('page_info', 'qualities'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$quality                 = ReviewWiseQuality::findOrFail($id);
		$page_info['page_title'] = 'Edit Rating Wise Quality';
		$page_info['page_name']  = 'edit_rating_wise_quality';

		return view('backend.admin.review_wise_ratings.edit', compact('page_info', 'quality'));
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
		$quality = ReviewWiseQuality::findOrFail($id);
		$input   = $request->all();

		if ($quality->update($input))
		{
			Session::flash('success_message', 'Data Updated Successfully');
		}
		else
		{
			Session::flash('error_message', 'Data not Updated Successfully');
		}

		return redirect('/admin/rating_wise_quality');
	}
}
