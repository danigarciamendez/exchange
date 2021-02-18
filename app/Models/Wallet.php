<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';

    protected $fillable = [
        'user_id',
        'crypto_id',
        'quantity',
        'value'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cryptos(){
        return $this->belongsTo(Cryptocurrency::class,'crypto_id','id');
    }
}
