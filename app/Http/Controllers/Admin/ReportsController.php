<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PackagePurchasedHistory;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$page_info['timestamp_start'] = strtotime('-29 days', time());
		$page_info['timestamp_end']   = strtotime(date('Y-m-d h:i:s'));
		$page_info['page_title']      = 'Reports';
		$page_info['page_name']       = 'reports';
		$purchase_histories           = PackagePurchasedHistory::where([
			['purchase_date', '>=', date('Y-m-d h:i:s', $page_info['timestamp_start'])],
			['purchase_date', '<=', date('Y-m-d h:i:s', $page_info['timestamp_end'])]
		])->get();

		return view('backend.admin.reports.index', compact('page_info', 'purchase_histories'));
	}

	/**
	 * Display listing of the reports for the given time range.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function filter_by_date_range(Request $request)
	{
		$input                        = explode('-', $request->date_range);
		$page_info['timestamp_start'] = strtotime($input[0], time());
		$page_info['timestamp_end']   = strtotime($input[1], time());
		$page_info['page_title']      = 'Reports';
		$page_info['page_name']       = 'reports';
		$purchase_histories           = PackagePurchasedHistory::where([
			['purchase_date', '>=', date('Y-m-d h:i:s', $page_info['timestamp_start'])],
			['purchase_date', '<=', date('Y-m-d h:i:s', $page_info['timestamp_end'])]
		])->get();

		return view('backend.admin.reports.index', compact('page_info', 'purchase_histories'));
	}

}
