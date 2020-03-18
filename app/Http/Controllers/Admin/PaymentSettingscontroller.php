<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentSettingscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();
        $paypal_currencies = Currency::where('paypal_supported',1)->get();
        $stripe_currencies = Currency::where('stripe_supported',1)->get();
        $page_info['page_title'] = 'Payment Settings';
        $page_info['page_name']  = 'payment_settings';

        return view('backend.admin.settings.payment', compact('page_info','currencies','paypal_currencies','stripe_currencies'));
    }

    /**
     * To update the payment settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_system_currency(Request $request)
    {
    }

    /**
     * To update the paypal settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_paypal(Request $request)
    {
    }

    /**
     * To update the stripe settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_stripe(Request $request)
    {
    }

    
}
