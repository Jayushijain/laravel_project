<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    public function amenity()
    {
        return $this->hasMany('App\Amenitie');
    }
}
