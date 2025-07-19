<?php

namespace App\Models;

use Database\Factories\QuizCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizCategory extends Model
{
    /** @use HasFactory<QuizCategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class, 'quiz_categories_id');
    }
}
