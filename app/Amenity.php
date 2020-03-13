<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
	use Sluggable;

	protected $fillable = ['icon', 'name'];

	public function sluggable()
	{
		return [
			'slug' => [
				'source'   => 'name',
				'onUpdate' => true
			]
		];
	}
}
