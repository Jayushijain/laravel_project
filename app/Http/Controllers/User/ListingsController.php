<?php

namespace App\Http\Controllers\User;

use App\Amenity;
use App\Category;
use App\City;
use App\Country;
use App\Listing;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "hii";
        $listings                = Listing::where('user_id',Auth::user()->id)->get();
        $page_info['page_title'] = 'Listings';
        $page_info['page_name']  = 'listings';

        return view('backend.user.listings.index', compact( 'listings', 'page_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries               = Country::all();
        $categories              = Category::all();
        $amenities               = Amenity::all();
        $page_info['page_title'] = 'Add New Listing';
        $page_info['page_name']  = 'add_listing';

        return view('backend.user.listings.create', compact('countries', 'categories','amenities', 'page_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $photo_gallery = [];
        if($request->is_featured)
        {
            $input['is_featured'] = sanitizer($request->is_featured);
        }
        else
        {
            $input['is_featured'] = sanitizer(0);
        }

        if(sizeof($request->amenity_id)>0)
        {
            $input['amenity_id'] = implode(',',$request->amenity_id);
        }
        else
        {
            $input['amenity_id'] = $request->amenity_id;
        }

        if(sizeof($request->category_id)>0)
        {
            $input['category_id'] = implode(',',$request->category_id);
            array_pop($input['category_id']);
        }
        else
        {
            $input['category_id'] = $request->category_id;
        }

        $input['user_id'] = Auth::user()->id;
        $social_links = array(
            'facebook' => sanitizer($request->facebook),
            'twitter'  => sanitizer($request->twitter),
            'linkedin' => sanitizer($request->linkedin),
          );
        $input['social'] = json_encode($social_links);

        $time_config = array();
        $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
        foreach ($days as $day) {
        $time_config[$day] = sanitizer($request->$day.'_opening').'-'.sanitizer($request->$day.'_closing');
      }

        if ($file = $request->file('listing_thumbnail'))
        {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_thumbnails', $filename);
            $input['listing_thumbnail'] = $filename;
        }

        if ($file = $request->file('listing_cover'))
        {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_cover_photo', $filename);
            $input['listing_cover'] = $filename;
        }

        foreach ($request->file('listing_images') as $listing_image) 
        {
            if ($file = $listing_image)
            {
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
                $file->move('uploads/listing_images', $filename);
                array_push($photo_gallery,$filename);
            }   
        }
        
        $input['photos'] = json_encode($photo_gallery);
        $input['code'] = md5(rand(10000000, 20000000));

        if(Auth::user()->role_id == 1)
        {
            $input['status'] = 1;
        }
        else
        {
            $input['status'] = 0;
        }

        $listing = Listing::create($input);
        
        if ($listing)
        {
            Session::flash('success_message', 'Listing Created');
        }
        else
        {
            Session::flash('error_message', 'Listing not Created');
        }

        return redirect('user/user_listings');
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
    }

    public function update_column(Request $request, $id)
    {
        $value = Listing::where('id', $id)->value($request->column);

        if ($value == 0)
        {
            $input[$request->column] = 1;
        }
        else
        {
            $input[$request->column] = 0;
        }

        $listing = Listing::findOrFail($id)->update($input);

        if ($listing)
        {
            Session::flash('success_message', 'Listing Updated');
        }
        else
        {
            Session::flash('error_message', 'Listing not Updated');
        }

        return redirect('user/user_listings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing                 = Listing::findOrFail($id);
        $countries               = Country::all();
        $categories              = Category::all();
        $amenities               = Amenity::all();
        $page_info['page_title'] = 'Listing Edit';
        $page_info['page_name']  = 'edit_listing';

        return view('backend.user.listings.edit', compact('listing','countries', 'categories','amenities', 'page_info'));
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
        $input = $request->all();
        $listing = Listing::findOrFail($id);
        $photo_gallery = [];
        if($request->is_featured)
        {
            $input['is_featured'] = sanitizer($request->is_featured);
        }
        else
        {
            $input['is_featured'] = sanitizer(0);
        }

        if(sizeof($request->amenity_id)>0)
        {
            $input['amenity_id'] = implode(',',$request->amenity_id);
        }
        else
        {
            $input['amenity_id'] = $request->amenity_id;
        }

        if(sizeof($request->category_id)>0)
        {
            $input['category_id'] = implode(',',$request->category_id);
            //array_pop($input['category_id']);
        }
        else
        {
            $input['category_id'] = $request->category_id;
        }

        $input['user_id'] = Auth::user()->id;
        $social_links = array(
            'facebook' => sanitizer($request->facebook),
            'twitter'  => sanitizer($request->twitter),
            'linkedin' => sanitizer($request->linkedin),
          );
        $input['social'] = json_encode($social_links);

        $time_config = array();
        $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
        foreach ($days as $day) {
        $time_config[$day] = sanitizer($request->$day.'_opening').'-'.sanitizer($request->$day.'_closing');
      }

      if($request->file('listing_thumbnail') != "")
      {
        if ($file = $request->file('listing_thumbnail'))
        {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_thumbnails', $filename);
            $input['listing_thumbnail'] = $filename;
        }
      }
      else
      {
        $input['listing_thumbnail'] = $listing->listing_thumbnail;
      }

      if($request->file('listing_thumbnail') != "")
      {
        if ($file = $request->file('listing_cover'))
        {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
            $file->move('uploads/listing_cover_photo', $filename);
            $input['listing_cover'] = $filename;
        }
      }
      else
      {
        $input['listing_cover'] = $listing->listing_cover;
      } 

      $photos = json_decode($request->photos);
      $listing_images = $request->file('listing_images');
        foreach ($listing_images as $listing_image)  
        {
            if ($file = $listing_image)
            {
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
                $file->move('uploads/listing_images', $filename);
                array_push($photo_gallery,$filename);
            }   
        }
        
        $input['photos'] = json_encode($photo_gallery);
        $input['code'] = md5(rand(10000000, 20000000));

        if(Auth::user()->role_id == 1)
        {
            $input['status'] = 1;
        }
        else
        {
            $input['status'] = 0;
        }
        
        if ($listing->update($input))
        {
            Session::flash('success_message', 'Listing Updated');
        }
        else
        {
            Session::flash('error_message', 'Listing not Updated');
        }

        return redirect('user/user_listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        if ($listing->delete())
        {
            Session::flash('success_message', 'Listing Deleted');
        }
        else
        {
            Session::flash('error_message', 'Listing not Deleted');
        }

        return redirect('user/user_listings');
    }
}
