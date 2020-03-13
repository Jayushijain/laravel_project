<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CommonModel extends Model
{
    //
    protected function banner_title($type = '')
    {
        $settings = DB::table('frontend_settings')->where('type', $type)->first();
        return $settings->description;
    }
}
