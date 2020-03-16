<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePurchasedHistory extends Model
{
	
    protected $fillable =[ 'package_id', 'user_id', 'expired_date', 'amount_paid', 'purchase_date', 'payment_method'];
}
