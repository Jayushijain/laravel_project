<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['listing_id','reviewer_id','review_comment','review_rating'];
}
