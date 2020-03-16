<?php

namespace App\Http\Controllers\Admin;

use App\Package;
use App\User;
use App\PackagePurchasedHistory;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
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
		//
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
		//
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
