<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class WishListsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$listings                = get_user_wise_wishlist();
		$page_info['page_title'] = 'Wishlists';
		$page_info['page_name']  = 'wishlists';

		return view('backend.user.wishlists.index', compact('listings', 'page_info'));
	}
}
