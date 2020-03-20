<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $userdata = session('listings_view','list_view');
        //$pagename = "listings_grid_view";
        $amenities = Amenity::all();
        $categories = Category::all();
        $listings = Listing::all();
        return view('frontend.listings',compact('listings','categories','amenities','userdata'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $selected_category_id
     * @param  string $search_string
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //return $request->all();
        $search_string = $request->search_string;
        $selected_category_id = $request->selected_category_id;

        // if($search_string != "" && $selected_category_id != "")
        // {   
        //     $listings = DB::table('listings')->where('name', $search_string)->get();
        //     $categories = Category::findOrFail($selected_category_id);
        //     $page['search_string'] = $search_string;
        //     $page['category_ids'] = array($selected_category_id);
        // }

        if($selected_category_id != "")
        {
            if($selected_category_id == "all")
            {
                $categories = Category::all();
                $listings = Listing::all();
            }
            else
            {
                // $categories = DB::table('categories')->where('id', $selected_category_id)->get();
                // $listings = DB::table('listings')->where('categories', $selected_category_id)->get();
                $page['category_ids'] = array($selected_category_id);

                $categories = Category::all();
                $cate = Category::findOrFail($selected_category_id);
                $listings = DB::table('listings')->where('listing_type', strtolower($cate->name))->orWhere('category_id', 'like',$cate->id)->get();
            }
        }
        
        if($search_string != "")
        {
            $listings = DB::table('listings')->where('name', 'like',$search_string)->orWhere('listing_type', 'like',$search_string)->get();
            $categories = Category::all();
            $page['search_string'] = $search_string;
        }
        $amenities = Amenity::all();
        return view('frontend.listings',compact('listings','categories','amenities','page'));
    }
        
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */    
    public function review(Request $request)
    {
        $user=Auth::user();
        //return $request->all();
        
        DB::table('reviews')->insert([
            'listing_id' => $request->listing_id,
            'reviewer_id' => $user->id,
            'review_comment' => $request->review_comment,
            'review_rating'=> $request->review_rating,
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function claim(Request $request)
    {
        $user=Auth::user();
        //return $request->all();
        
        DB::table('claimed_listings')->insert([
            'listing_id' => $request->listing_id,
            'user_id' => $user->id,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'additional_information'=> $request->additional_information,
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {
        $user=Auth::user();
        //return $request->all();
        
        DB::table('reported_listings')->insert([
            'listing_id' => $request->listing_id,
            'reporter_id' => $user->id,
            'report' => $request->report,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listingsview($id)
    {
        $amenities = Amenity::all();
        $categories = Category::all();
        $cate = Category::findOrFail($id);
        $listings = DB::table('listings')->where('listing_type', strtolower($cate->name))->orWhere('category_id', 'like',$cate->id)->get();
        return view('frontend.listings',compact('listings','categories','amenities'));
        
    }

    public function listings_view($param1 = ''){
        return session('listings_view',$param1);
    }


}
