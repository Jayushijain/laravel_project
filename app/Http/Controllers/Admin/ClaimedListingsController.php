<?php

namespace App\Http\Controllers\Admin;

use App\ClaimedListing; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClaimedListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claimed_listings                = ClaimedListing::all();
        $page_info['page_title'] = 'Claimed Listings';
        $page_info['page_name']  = 'claimed_listings';

        return view('backend.admin.listings.claimed_listings', compact('claimed_listings', 'page_info'));
    }

    /**
     * To update the status of a single lisying.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $claimed_listing = ClaimedListing::findOrFail($id);
        $status         = ClaimedListing::where('id',$id)->value('status');
        
        if($status != 1)
        {
            $input['status'] = 1;
            $claimed_listing->update($input);
            Session::flash('success_message','Claimed Listing Approved Successfully');
        }
        else
        {
            Session::flash('error_message','Listing is Already Approved!');
        }

        return redirect('/admin/claimed_listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $claimed_listing = ClaimedListing::findOrFail($id);

        if($claimed_listing->delete())
        {
            Session::flash('success_message','Claimed Listing is Deleted');
        }
        else
        {
            Session::flash('error_message','Claimed Listing is not Deleted');
        }

        return redirect('/admin/claimed_listings');
    }
}
