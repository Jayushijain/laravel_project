<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function histories()
	{
		return $this->hasMany('app\PackagePurchasedHistory');
	}
}
