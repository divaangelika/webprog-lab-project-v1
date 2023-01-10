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
        'imgBgenre_idackground'
    ];

    public function movie()
    {
        return $this->belongsTo(Genre::class);
        return $this->belongsTo(Actor::class);
    }
}
