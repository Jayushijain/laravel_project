<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentSettingscontroller extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$currencies              = Currency::all();
		$paypal_currencies       = Currency::where('paypal_supported', 1)->get();
		$stripe_currencies       = Currency::where('stripe_supported', 1)->get();
		$page_info['page_title'] = 'Payment Settings';
		$page_info['page_name']  = 'payment_settings';

		return view('backend.admin.settings.payment', compact('page_info', 'currencies', 'paypal_currencies', 'stripe_currencies'));
	}

	/**
	 * To update the system currency.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update_system_currency(Request $request)
	{
		$flag = 0;

		$input['description'] = sanitizer($request->system_currency);

		if (!Setting::where('type', 'system_currency')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->currency_position);

		if (!Setting::where('type', 'currency_position')->update($input))
		{
			$flag = 1;
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Payment Settings not Updated');
		}
		else
		{
			Session::flash('success_message', 'Payment Settings Updated');
		}

		return redirect('/admin/payment_settings');
	}

	/**
	 * To update the paypal settings.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update_paypal(Request $request)
	{
		$flag = 0;

		$paypal['active']               = sanitizer($request->paypal_active);
		$paypal['mode']                 = sanitizer($request->paypal_mode);
		$paypal['sandbox_client_id']    = sanitizer($request->sandbox_client_id);
		$paypal['production_client_id'] = sanitizer($request->production_client_id);

		$input['description'] = json_encode($paypal);

		if (!Setting::where('type', 'paypal')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->paypal_currency);

		if (!Setting::where('type', 'paypal_currency')->update($input))
		{
			$flag = 1;
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Paypal Settings not Updated');
		}
		else
		{
			Session::flash('success_message', 'Paypal Settings Updated');
		}

		return redirect('/admin/payment_settings');
	}

	/**
	 * To update the stripe settings.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update_stripe(Request $request)
	{
		$flag = 0;

		$stripe['active']          = sanitizer($request->stripe_active);
		$stripe['testmode']        = sanitizer($request->testmode);
		$stripe['public_key']      = sanitizer($request->public_key);
		$stripe['secret_key']      = sanitizer($request->secret_key);
		$stripe['public_live_key'] = sanitizer($request->public_live_key);
		$stripe['secret_live_key'] = sanitizer($request->secret_live_key);

		$input['description'] = json_encode($stripe);

		if (!Setting::where('type', 'stripe')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->stripe_currency);

		if (!Setting::where('type', 'stripe_currency')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->website_title);

		if (!Setting::where('type', 'website_title')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->system_title);

		if (!Setting::where('type', 'system_title')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->language);

		if (!Setting::where('type', 'language')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->text_align);

		if (!Setting::where('type', 'text_align')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->system_email);

		if (!Setting::where('type', 'system_email')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->address);

		if (!Setting::where('type', 'address')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->phone);

		if (!Setting::where('type', 'phone')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->purchase_code);

		if (!Setting::where('type', 'purchase_code')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->vat_percentage);

		if (!Setting::where('type', 'vat_percentage')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->country_id);

		if (!Setting::where('type', 'country_id')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->timezone);

		if (!Setting::where('type', 'timezone')->update($input))
		{
			$flag = 1;
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Stripe Settings not Updated');
		}
		else
		{
			Session::flash('success_message', 'Stripe Settings Updated');
		}

		return redirect('/admin/payment_settings');
	}
}
