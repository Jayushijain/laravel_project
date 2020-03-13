<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Sluggable; 

    protected $fillable = ['name','parent_id','icon_class','thumbnail','slug'];
    protected $uploads = '/uploads/category_thumbnails/';

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // public function getThumbnailAttribute($value)
    // {
    //     if($value != "")
    //     {
    //         return $this->uploads.$value;
    //     }
    // }
}
