<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\PackagePurchasedHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Auth::user()->id;
        $currently_active_package = PackagePurchasedHistory::where([
            ['expired_date', '>=', date('Y-m-t').' 00:00:00'],
            ['purchase_date', '<=', date('Y-m-t').' 00:00:00'],
            ['user_id', '=', Auth::user()->id]
        ])->first();

        $page_info['page_title'] = 'Dashboard';
        $page_info['page_name']  = 'dashboard';
        // $package = Auth::user()->packagePurchasedHistories;

        // return $currently_active_package = $package->where([
        //     ['expired_date', '>=', strtotime(date('t-m-Y').' 00:00:00')],
        //     ['purchase_date', '<=', strtotime(date('t-m-Y').' 00:00:00')]
        // ])->get();

        return view('backend.user.index',compact('currently_active_package','page_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $page_info['page_title'] = 'Manage Profile';
        $page_info['page_name']  = 'edit_profile';

        return view("backend.user.edit",compact('user','page_info'));
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
        $user = User::findOrFail($id);

        if($request->new_password == "")
        { 
            $input = $request->all();
            $input['email'] = sanitizer($request->email);
            $input['name'] = sanitizer($request->name);
            $input['address'] = sanitizer($request->address);
            $input['phone'] = sanitizer($request->phone);
            $input['website'] = sanitizer($request->website);
            $input['about'] = sanitizer($request->about);
            $social_links = array(
                'facebook' => sanitizer($request->facebook),
                'twitter' => sanitizer($request->twitter),
                'linkedin' => sanitizer($request->linkedin),
            );
            $input['social'] = json_encode($social_links);

            if ($file = $request->file('user_image'))
            {
                $filename = $id.'.jpg';
                $file->move('uploads/user_image', $filename);
            }       
            if($user->update($input))
            {
                Session::flash('success_message', 'Profile Updated');
            }
            else
            {
                Session::flash('error_message', 'Profile Updated');
            }
            
        }
        else if($request->new_password != "")
        {
            $password = bcrypt($request->new_password);
            $user->update(array('password'=>$password));
            Session::flash('success_message', 'Password Changed');
        }
        else
        {
            Session::flash('error_message', 'No changes are made');
        }

        $page_info['page_title'] = 'Manage Profile';
        $page_info['page_name']  = 'edit_profile';

        return view("backend.user.edit",compact('user','page_info'));
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
