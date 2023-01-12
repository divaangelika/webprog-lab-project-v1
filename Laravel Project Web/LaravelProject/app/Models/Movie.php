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
        'img_thumbnail',
        'img_background'
    ];

    public function movieactor(){
        return $this->hasMany(MovieActor::class);
    }

    public function watchlist(){
        return $this->hasMany(Watchlist::class);
    }

    public function moviegenre(){
        return $this->hasMany(MovieGenre::class);
    }
}
