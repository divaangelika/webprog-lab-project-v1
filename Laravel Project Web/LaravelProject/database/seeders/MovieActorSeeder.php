<?php

namespace Database\Seeders;

use App\Models\MovieActor;
use Illuminate\Database\Seeder;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieActor::create([
            'actor_id' => 1,
            'movie_id' => 1,
            'name'=>'Ethan Hunt'
        ]);
    }
}
