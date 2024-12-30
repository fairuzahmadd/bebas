<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'kelas',
        'mata_pelajaran',
        'bab',
        'nama_video',
        'video_url',
    ];

    public function bookmarks()

    {
        
    return $this->hasMany(Bookmark::class);

    }

}
