<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'tryout_id', 'question_text', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_option'
    ];

    // Relasi Many to One (Question milik Tryout)
    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
