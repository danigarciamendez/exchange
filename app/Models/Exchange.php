<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $table = 'exchanges';

    protected $fillable = [
        'name',
        'image',
        'description',
        'website',
        'crypto_number',
        'assessment'
    ];

    public function contains(){
        return $this->hasMany(Contain::class);
    }
    public function cryptocurrencies(){
        return $this->belongsToMany(Cryptocurrency::class, 'contains', 'exchange_id', 'cryptocurrency_id');
    }

    public function scopeSearchBy($query, $type, $search) {
    	if ( ($type) && ($search) ) {
    		return $query->where($type,'like',"%$search%");
    	}
    }
}
