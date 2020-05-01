<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoomSpecification extends Model
{
    protected $fillable =['listing_id', 'name', 'description', 'price', 'amenities', 'photo'];
}
