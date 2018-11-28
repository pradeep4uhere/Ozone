<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Seller;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function UserProduct() {
        return $this->hasMany(UserProduct::class);
    }
    
    public function Seller() {
        return $this->hasMany('App\Seller', 'user_id', 'id');
    }

    public function sellerprofile() {
        return $this->hasMany(Seller::class, 'id', 'user_id');
    }
}
