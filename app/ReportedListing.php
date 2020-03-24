<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportedListing extends Model
{
    protected $fillable = ['listing_id', 'reporter_id', 'report', 'status'];

    public function listing()
    {
    	return $this->belongsTo('App\Listing');
    }

	public function reporter()
    {
    	return $this->belongsTo('App\User');
    }
}
