<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laptop extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'brand',
        'model',
        'price',
        'img_url',
        'desc',
        'company_id',
        'course_id',
        'url'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
