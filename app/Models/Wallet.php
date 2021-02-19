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
        'cryptocurrency_id',
        'quantity'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function cryptos(){
        return $this->belongsTo(Cryptocurrency::class,'cryptocurrency_id','id');
    }
}
