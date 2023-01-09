<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'genre_id',
        'director',
        'releaseDate',
        'imgThumbnail',
        'imgBackground'
    ];

    public function category()
    {
        return $this->belongsTo(Genre::class);
    }
}
