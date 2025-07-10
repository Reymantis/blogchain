<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /** @use HasFactory<\Database\Factories\QuizFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'difficulty',
        'time_limit',
    ];
    protected $casts = [
        'time_limit' => 'integer',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
