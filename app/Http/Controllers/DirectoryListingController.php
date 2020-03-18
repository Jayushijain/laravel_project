<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Amenity;
use App\Category;
use App\Listing;
class DirectoryListingController extends Controller
{
    //
    public function index()
    {
        //
        // $userdata = Session::put('listings_view','list_view');
        $amenities = Amenity::all();
        $categories = Category::all();
        $listings = Listing::all();
        return view('frontend.listings',compact('listings','categories','amenities'));
    }
}
