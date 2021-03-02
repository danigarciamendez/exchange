<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'account_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Relación con tabla Follow
     */
    public function follows(){
        return $this->hasMany(Follow::class);
    }

    /**
     * Relación con tabla Cryptocurrencies a traves de Follow
     */
    public function cryptocurrencies(){
        return $this->belongsToMany(Cryptocurrency::class, 'follows', 'user_id', 'cryptocurrency_id');
    }
    
    public function scopeSearchBy($query, $type, $search) {
    	if ( ($type) && ($search) ) {
    		return $query->where($type,'like',"%$search%");
    	}
    }
}
