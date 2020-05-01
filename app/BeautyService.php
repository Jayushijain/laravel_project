<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyService extends Model
{
    protected $fillable = ['listing_id', 'name', 'price', 'service_times', 'photo'];
}
