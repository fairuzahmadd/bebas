<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;

    protected $table = 'tryouts';

    protected $fillable = [
        'title', 'description', 'start_time', 'end_time', 'status'
    ];

    // Relasi One to Many (Tryout memiliki banyak Questions)
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
