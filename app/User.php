<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','name','address','phone','website','social','role_id','wishlists','verification_code','is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function LoginCheck()
    {
        if($this->role->name == "Admin" && $this->is_verified == 1)
        {
            return true;
        }
        return false;
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    

    
}
