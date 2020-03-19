<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmtpSettingscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_info['page_title'] = 'SMTP Settings';
        $page_info['page_name']  = 'smtp_settings';

        return view('backend.admin.settings.smtp', compact( 'page_info'));
    }

    /**
     * To update the smtp settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_settings(Request $request)
    {
        $flag = 0;

        $input['description'] = sanitizer($request->smtp_protocol);
        if(!Setting::where('type', 'protocol')->update($input))
        {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->smtp_user);
        if(!Setting::where('type', 'smtp_user')->update($input))
        {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->smtp_pass);
        if(!Setting::where('type', 'smtp_pass')->update($input))
        {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->smtp_host);
        if(!Setting::where('type', 'smtp_host')->update($input))
        {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->smtp_port);
        if(!Setting::where('type', 'smtp_port')->update($input))
        {
            $flag = 1;
        }

        if($flag == 1)
        {
            Session::flash('error_message', 'SMTP Settings not Updated successfully');
        }
        else
        {
            Session::flash('success_message', 'SMTP Settings Updated');
        }

        return redirect('/admin/smtp_settings');
    }

    
}
