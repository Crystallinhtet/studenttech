<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory; 
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id,',
        'laptop_id',
        'rating', 
        'comment',
    ];

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
