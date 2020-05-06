<?php

namespace App\Http\Controllers\User;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($page)
	{
		$bookings = Booking::where([
			['listing_type', $page],
			['user_id', Auth::user()->id]
		])->orderBy('id', 'DESC')->get();
		$page_info['page_title'] = 'Booking Request';
		$page_info['page_name']  = 'booking_request_'.$page;

		//return $bookings;

		return view('backend.user.bookings.'.$page, compact('bookings', 'page_info'));
	}

	/**
	 * To update the status of the booking.
	 *
	 * @param  string  $request_type  [the value of current status]
	 * @param  int     $id            [the id of the recore that has to be updated]
	 * @return \Illuminate\Http\Response
	 */
	public function update_status($request_type = ' ', $id = ' ')
	{
		$flag         = 0;
		$booking_type = Booking::where('id', $id)->pluck('listing_type')[0];

		if ($request_type == 'pending')
		{
			$input['status'] = 0;

			if (!Booking::where('id', $id)->update($input))
			{
				$flag = 1;
			}
		}

		if ($request_type == 'approved')
		{
			$input['status'] = 1;

			if (!Booking::where('id', $id)->update($input))
			{
				$flag = 1;
			}
		}

		if ($flag == 1)
		{
			Session::flash('error_message', 'Request '.ucfirst($request_type).' not successfully');
		}
		else
		{
			Session::flash('success_message', 'Request '.ucfirst($request_type).' successfully');
		}

		return redirect('/user/user_booking_request/'.$booking_type);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$booking_type = Booking::where('id', $id)->pluck('listing_type')[0];
		$booking      = Booking::findOrFail($id);

		if ($booking->delete())
		{
			Session::flash('success_message', 'Booking Deleted');
		}
		else
		{
			Session::flash('error_message', 'Booking not Deleted');
		}

		return redirect('/user/user_booking_request/'.$booking_type);
	}
}
