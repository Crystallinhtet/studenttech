<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'laptop_id',
        'course_id',
    ];

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
