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
        'description',
        'price',
        'image',
        'vol_market'
    ];

    public function wallets(){
        return $this->hasMany(Wallet::class, 'id','crypto_id');
    }
}
