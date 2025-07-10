<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /** @use HasFactory<\Database\Factories\OptionsFactory> */
    use HasFactory;
    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
    ];
    protected $casts = [
        'is_correct' => 'boolean',
        'points' => 'integer',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function getPointsAttribute()
    {
        return $this->is_correct ? 1 : 0; // Points awarded for selecting this option
    }
}
