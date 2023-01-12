<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([

            [
                'name' => 'Tom Cruise',
                'gender' => 'Male',
                'biography' => 'Thomas Cruise Mapother IV, known professionally as Tom Cruise, is an American actor and producer. One of the world\'s highest-paid actors, he has received various accolades, including an Honorary Palme d\'Or and three Golden Globe Awards, in addition to nominations for three Academy Awards',
                'dobActor' => '1962-03-07',
                'pobActor' => 'Syracuse, New York, United States',
                'imgActor' => 'https://images.mubicdn.net/images/cast_member/2184/cache-2992-1547409411/image-w856.jpg?size=800x',
                'popularity' => '4.6',
            ]
        ]);
    }
}
