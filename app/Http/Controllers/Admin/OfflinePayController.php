<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use App\PackagePurchasedHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OfflinePayController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users                   = User::where('role_id', 2)->get();
		$packages                = Package::where('package_type', 1)->get();
		$page_info['page_title'] = 'Offline Payment';
		$page_info['page_name']  = 'offline_payment';

		return view('backend.admin.offline_payment.index', compact('page_info', 'users', 'packages'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input                  = $request->all();
		$validity               = Package::where('id', $input['package_id'])->pluck('validity');
		$purchase_date          = strtotime('now');
		$expired_date           = strtotime('+'.$validity[0].' days');
		$input['purchase_date'] = date('Y-m-d h:i:s', $purchase_date);
		$input['expired_date']  = date('Y-m-d h:i:s', $expired_date);

		$package_history = PackagePurchasedHistory::create($input);

		if ($package_history)
		{
			Session::flash('success_message', 'Offline Payment Success');
		}
		else
		{
			Session::flash('error_message', 'Offline Payment was not Successful');
		}

		return redirect('/admin/offline_payment');
	}
}
