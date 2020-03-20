<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user=Auth::user();

        $data['user_id']      = $request->user_id;
        $data['requester_id'] = $user->id;
        $data['listing_id']   = $request->listing_id;
        $data['listing_type'] = $request->listing_type;

        if($data['listing_type'] == 'restaurant')
        {
            $data['booking_date'] = date("Y-m-d", strtotime($request->dates));
            $additional_data['adult_guests'] = $request->adult_guests_for_booking;  
            $additional_data['child_guests']= $request->child_guests_for_booking;
            $additional_data['time']        = $request->time;
            $data['additional_information'] = json_encode($additional_data);
            $data['created_at']             = strtotime(date('dMY'));
            Booking::create($data);
            return redirect()->back();
            
        }
        elseif($data['listing_type'] == 'beauty')
        {
            $data['booking_date']           = date("Y-m-d", strtotime($request->dates));
            $additional_data['time']        = $request->time;
            $additional_data['service']     = $request->service;  
            $additional_data['note']        = $request->note;
            $data['additional_information'] = json_encode($additional_data);
            $data['created_at']             = strtotime(date('dMY'));
            Booking::create($data);
            return redirect()->back();
        }
        elseif($data['listing_type'] == 'hotel')
        {
            $dates= explode('>', $request->dates);
            // $data['book_from'] = $dates[0];
            // $data['book_to'] = $dates[1];
            

            $data['booking_date']        = date("Y-m-d", strtotime($dates[0])) .' | '. date("Y-m-d", strtotime($dates[1]));
            $additional_data['adult_guests'] = $request->adult_guests_for_booking;  
            $additional_data['child_guests'] = $request->child_guests_for_booking;
            $additional_data['room_type']    = $request->room_type;
            $data['additional_information']  = json_encode($additional_data);
            $data['created_at']              = strtotime(date('dMY'));
            Booking::create($data);
            return redirect()->back();
        }
        else
        {
            $data['name'] = $request->name;
            $data['message'] = $request->message;
            $data['to'] = $request->email;
            return $data;
        }
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
}
