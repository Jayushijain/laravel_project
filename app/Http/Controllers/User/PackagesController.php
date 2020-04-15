<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Package;
use App\PackagePurchasedHistory;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PackagesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$packages                = Package::all();
		$page_info['page_title'] = 'Packages';
		$page_info['page_name']  = 'packages';

		return view('backend.user.packages.index', compact('packages', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function history()
	{
		$purchase_histories = PackagePurchasedHistory::where('user_id',Auth::user()->id)->get();
		$page_info['page_title'] = 'Purchse History';
		$page_info['page_name']  = 'purchase_history';

		return view('backend.user.packages.history', compact('page_info','purchase_histories'));
	}

	public function stripe_checkout($package_id)
	{
		$package_details = Package::findOrFail($package_id);
		$user_details = User::findOrFail(Auth::user()->id);

		return view('backend.user.packages.stripe_checkout', compact('package_details','user_details'));
	}
	
	public function paypal_checkout($package_id)
	{
		$package_details = Package::findOrFail($package_id);
		$user_details = User::findOrFail(Auth::user()->id);

		return view('backend.user.packages.paypal_checkout', compact('package_details','user_details'));
	}
	
};
