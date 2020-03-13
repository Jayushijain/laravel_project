<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $fillable = [
        'package_type',
        'name',
        'price',
        'number_of_listings',
        'ability_to_add_video',
        'ability_to_add_contact_form',
        'number_of_photos',
        'number_of_tags',
        'number_of_categories',
        'is_recommended',
        'featured',
    ];
}
