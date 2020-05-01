<?php

namespace App\Http\Controllers\Admin;

use App\Package;
use App\User;
use App\PackagePurchasedHistory;
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

		return view('backend.admin.packages.index', compact('packages', 'page_info'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$page_info['page_title'] = 'Add New Package';
		$page_info['page_name']  = 'add_package';

		return view('backend.admin.packages.create', compact('page_info'));
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

		if (!$request->ability_to_add_video)
		{
			$input['ability_to_add_video'] = 0;
		}

		if (!$request->ability_to_add_contact_form)
		{
			$input['ability_to_add_contact_form'] = 0;
		}

		if (!$request->is_recommended)
		{
			$input['is_recommended'] = 0;
		}

		if (!$request->featured)
		{
			$input['featured'] = 0;
		}

		$package = Package::create($input);

		if ($package)
		{
			Session::flash('success_message', 'Package Created');
		}
		else
		{
			Session::flash('error_message', 'Package not Created');
		}

		return redirect('/admin/packages');
	}

/**
 * Display the specified resource invoice.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function package_invoice($id)
	{
		$purchase_history = PackagePurchasedHistory::findOrFail($id);
		$user_details = User::where('id',$purchase_history->user_id)->first();
		$package_details = Package::where('id',$purchase_history->package_id)->first();

		$page_info['page_title'] = 'Package Invoice';
		$page_info['page_name']  = 'invoice';

		return view('backend.admin.packages.invoice',compact('purchase_history','page_info','user_details','package_details'));
	}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function edit($id)
	{
		$package                 = Package::findOrFail($id);
		$page_info['page_title'] = 'Update Packages';
		$page_info['page_name']  = 'edit_packages';

		return view('backend.admin.packages.edit', compact('package', 'page_info'));
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
		$package = Package::findOrFail($id);
		$input   = $request->all();

		if (!$request->ability_to_add_video)
		{
			$input['ability_to_add_video'] = 0;
		}

		if (!$request->ability_to_add_contact_form)
		{
			$input['ability_to_add_contact_form'] = 0;
		}

		if (!$request->is_recommended)
		{
			$input['is_recommended'] = 0;
		}

		if (!$request->featured)
		{
			$input['featured'] = 0;
		}

		if ($package->update($input))
		{
			Session::flash('success_message', 'Package Updated');
		}
		else
		{
			Session::flash('error_message', 'Package not Updated');
		}

		return redirect('/admin/packages');
	}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function destroy($id)
	{
		$package = Package::findOrFail($id);

        if ($package->delete())
        {
            Session::flash('success_message', 'Package Deleted');
        }
        else
        {
            Session::flash('error_message', 'Package not Deleted');
        }

        return redirect('/admin/packages');
	}
};
