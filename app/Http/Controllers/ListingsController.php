<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Category;
use App\Listing;
use App\Amenity;


class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //public function listings_view($param1 = ''){
        //     $this->session->set_userdata('listings_view', $param1);
        // }
        $userdata = Session::put('listings_view','list_view');
        $amenities = Amenity::all();
        $categories = Category::all();
        $listings = Listing::all();
        return view('frontend.listings',compact('listings','categories','amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $amenities = Amenity::all();
        $categories = Category::all();
        $listing_detail = Listing::findOrFail($id);
        return view('frontend.directory_listing',compact('listing_detail','categories','amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function search(Request $request)
    {
        //print_r($input = $request->all());
        // echo $search_string = $request['search_string'];
        // echo $selected_category_id = $request->selected_category_id;
        $search_string = "restaurant";
        $selected_category_id = 1;
        $amenities = Amenity::all();
        $categories = Category::all();
        $listings = Listing::findOrFail($selected_category_id);
        //$listings = search_listing($search_string,$selected_category_id);
        if ($selected_category_id != "") {
            $page['category_ids'] = array($selected_category_id);
        }
        if ($search_string != "") {
            $page['search_string'] = $search_string;
        }
        // return redirect('/listings',compact('listings','page'));
        return view('frontend.listings',compact('listings','categories'));
    }

    

}
