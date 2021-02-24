<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    use HasFactory;

    protected $table = 'contains';

    protected $fillable = [
        'exchange_id',
        'cryptocurrency_id'
    ];

    public function exchanges(){
        $this->belongsTo(Exchange::class);
    }

    public function cryptos(){
        $this->belongsTo(Cryptocurrency::class);
    }
}
