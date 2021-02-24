<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';

    protected $fillable = [
        'user_id',
        'cryptocurrency_id'
    ];

    public function users(){
        $this->belongsTo(User::class);
    }

    public function cryptos(){
        $this->belongsTo(Cryptocurrency::class);
    }

}
