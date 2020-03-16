<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewWiseQuality extends Model
{
    protected $fillable =[ 'rating_from', 'rating_to', 'quality'];
}
