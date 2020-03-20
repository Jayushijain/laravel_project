<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['user_id', 'city_id', 'country_id', 'category_id', 'amenity_id', 'code', 'name', 'description', 'photos', 'video_url', 'video_provider', 'tags', 'address', 'email', 'phone', 'website', 'social', 'latitude', 'longitude', 'google_analytics_id', 'status', 'listing_type', 'listing_thumbnail', 'listing_cover', 'seo_meta_tags', 'is_featured'];
    
    public function amenity()
    {
        return $this->hasMany('App\Amenity');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function country()
    {
    	return $this->belongsTo('App\Country');
    }

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    // public function categories()
    // {
    // 	return $this->hasMany('App\Category');
    // }
}
