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
        'percent_change_24h',
        'description',
        'price',
        'image',
        'vol_market'
    ];

    public function contains(){
        return $this->hasMany(Contain::class);
    }

    public function follows(){
        return $this->hasMany(Follow::class);
    }
}
