<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'biography',
        'dobActor',
        'pobActor',
        'imgActor',
        'popularity'
    ];

    public function category()
    {
        return $this->belongsTo(Genre::class);
    }
}
