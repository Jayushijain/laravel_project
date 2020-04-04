<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimedListing extends Model
{
    protected $fillable = ['listing_id', 'user_id', 'full_name', 'phone', 'additional_information', 'status'];

    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }

	public function user()
    {
    	return $this->belongsTo('App\User');
    }    

}
