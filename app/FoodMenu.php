<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    protected $fillable=[ 'listing_id', 'name', 'price', 'items', 'photo'];
}
