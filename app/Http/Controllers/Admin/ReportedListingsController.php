<?php

namespace App\Http\Controllers\Admin;

use App\ReportedListing; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportedListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reported_listings                = ReportedListing::all();
        $page_info['page_title'] = 'Reported Listings';
        $page_info['page_name']  = 'reported_listings';

        return view('backend.admin.listings.reported_listings', compact('reported_listings', 'page_info'));
    }

    /**
     * To update the status of a single listing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        $reported_listing = ReportedListing::findOrFail($id);
        $status         = ReportedListing::where('id',$id)->value('status');
        
        if($status == 1)
        {
            $input['status'] = 0;
            $reported_listing->update($input);
            Session::flash('success_message','Status updated Successfully');
        }
        else
        {
            $input['status'] = 1;
            $reported_listing->update($input);
            Session::flash('success_message','Status updated Successfully');
        }

        return redirect('/admin/reported_listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reported_listing = ReportedListing::findOrFail($id);

        if($reported_listing->delete())
        {
            Session::flash('success_message','Listing Deleted');   
        }
        else
        {
            Session::flash('error_message','Listing not deleted');
        }

        return redirect('/admin/reported_listings');
    }
}
