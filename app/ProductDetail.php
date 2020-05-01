<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable=['listing_id', 'name', 'variant', 'price', 'photo'];
}
