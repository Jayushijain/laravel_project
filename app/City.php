<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Sluggable;

	protected $fillable = ['country_id','name'];

	public function sluggable()
	{
		return [
			'slug' => [
				'source'   => 'name',
				'onUpdate' => true
			]
		];
	}

	public function country()
    {
        return $this->belongsTo('App\Country');
    }

}
