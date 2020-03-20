<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = ['user_id','requester_id','listing_id','listing_type','booking_date','additional_information','status'];
}
