<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemSettingscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $page_info['page_title'] = 'System Settings';
        $page_info['page_name']  = 'system_settings';

        return view('backend.admin.settings.system', compact( 'page_info','countries'));
    }

    /**
     * To update the system settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_settings(Request $request)
    {
        $flag = 0;
        $input['description'] = sanitizer($request->website_title);
        if(!Setting::where('type', 'website_title')->update($input))
        {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->system_title);
        if(!Setting::where('type', 'system_title')->update($input))
         {
            $flag = 1;
        }    

        $input['description'] = sanitizer($request->text_align);
        if(!Setting::where('type', 'text_align')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->system_email);
        if(!Setting::where('type', 'system_email')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->address);
        if(!Setting::where('type', 'address')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->phone);
        if(!Setting::where('type', 'phone')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->purchase_code);
        if(!Setting::where('type', 'purchase_code')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->vat_percentage);
        if(!Setting::where('type', 'vat_percentage')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->country_id);
        if(!Setting::where('type', 'country_id')->update($input))
         {
            $flag = 1;
        }

        $input['description'] = sanitizer($request->timezone);
        if(!Setting::where('type', 'timezone')->update($input))
         {
            $flag = 1;
        }
        
        if($flag == 1)
        {
            Session::flash('error_message', 'System Settings not Updated successfully');
        }
        else
        {
            Session::flash('success_message', 'System Settings Updated');
        }
        return redirect('/admin/system_settings');
    }

    
}
