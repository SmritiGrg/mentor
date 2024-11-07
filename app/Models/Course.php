<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price', 'category_id', 'trainer_id'];
    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id');
    }

    public function trainers()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }
}
