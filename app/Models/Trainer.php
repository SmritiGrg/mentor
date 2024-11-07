<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description'];

    public function courses(): void
    {
        $this->hasMany(Course::class, 'course_id', 'id');
    }
}
