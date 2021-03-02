<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;

    protected $table = 'cryptocurrencies';

    protected $fillable = [
        'name',
        'symbol',
        'price',
        'image',
        'percent_change_1h',
        'percent_change_24h',
        'percent_change_7d',
        'percent_change_30d',
        'volume_24h',
        'market_cap',
        'date_added'
        
    ];

    public function contains(){
        return $this->hasMany(Contain::class);
    }

    public function follows(){
        return $this->hasMany(Follow::class);
    }


    public function users(){
        return $this->belongsToMany(User::class, 'follows', 'cryptocurrency_id', 'user_id');
    }

    public function exchanges(){
        return $this->belongsToMany(Exchange::class, 'contains', 'cryptocurrency_id', 'exchange_id');
    }
    
    
    public function scopeSearchBy($query, $type, $search) {
    	if ( ($type) && ($search) ) {
    		return $query->where($type,'like',"%$search%");
    	}
    }
}
