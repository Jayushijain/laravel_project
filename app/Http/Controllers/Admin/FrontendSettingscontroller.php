<?php

namespace App\Http\Controllers\Admin;

use App\FrontendSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendSettingscontroller extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$page_info['page_title'] = 'Frontend Settings';
		$page_info['page_name']  = 'frontend_settings';

		return view('backend.admin.settings.frontend', compact('page_info'));
	}

	/**
	 * To update the values of the settings.
     * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update_settings(Request $request)
	{
		$flag = 0;

		$input['description'] = sanitizer($request->banner_title);

		if (!FrontendSetting::where('type', 'banner_title')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->banner_sub_title);

		if (!FrontendSetting::where('type', 'banner_sub_title')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->slogan);

		if (!FrontendSetting::where('type', 'slogan')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->about_us);

		if (!FrontendSetting::where('type', 'about_us')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->terms_and_condition);

		if (!FrontendSetting::where('type', 'terms_and_condition')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->privacy_policy);

		if (!FrontendSetting::where('type', 'privacy_policy')->update($input))
		{
			$flag = 1;
		}

		$input['description'] = sanitizer($request->faq);

		if (!FrontendSetting::where('type', 'faq')->update($input))
		{
			$flag = 1;
		}

		$social_links = array(
			'facebook'  => sanitizer($request->facebook),
			'twitter'   => sanitizer($request->twitter),
			'linkedin'  => sanitizer($request->linkedin),
			'google'    => sanitizer($request->google),
			'instagram' => sanitizer($request->instagram),
			'pinterest' => sanitizer($request->pinterest)
		);

		$input['description'] = json_encode($social_links);

		if (!FrontendSetting::where('type', 'social_links')->update($input))
		{
			$flag = 1;
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Frontend Settings not Updated');
		}
		else
		{
			Session::flash('success_message', 'Frontend Settings Updated');
		}

		return redirect('/admin/frontend_settings');
	}


    /**
     * to update the images on the frontend.
     * @param  \Illuminate\Http\Request  $request
     * @param  string                    $image_type [the image type which has to be updated]
     * @return \Illuminate\Http\Response
     */
	public function update_image(Request $request, $image_type = '')
	{
		//return $request->file('banner_image');
		$flag = 0;

		if ($image_type == 'banner_image')
		{
			if ($file = $request->file('banner_image'))
			{
				$filename = 'home_banner.jpg';

				if (!$file->move('uploads/system', $filename))
				{
					$flag = 1;
				}
			}
		}

		if ($image_type == 'light_logo' || $image_type == 'dark_logo' || $image_type == 'small_logo' || $image_type == 'favicon')
		{
			if ($file = $request->file($image_type))
			{
				$filename = $image_type.'.jpg';

				if (!$file->move('global', $filename))
				{
					$flag = 1;
				}
			}
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Frontend Settings not Updated');
		}
		else
		{
			Session::flash('success_message', 'Frontend Settings Updated');
		}

		return redirect('/admin/frontend_settings');
	}
}
