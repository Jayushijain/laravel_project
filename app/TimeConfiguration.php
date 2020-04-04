<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeConfiguration extends Model
{
    protected $fillable = ['listing_id', 'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']; 
}
