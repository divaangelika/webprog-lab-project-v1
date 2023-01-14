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
                'imgActor' => 'tomCruise.jpeg',
                'popularity' => '4.6',
            ],
            [
                'name' => 'Kristen Stewart',
                'gender' => 'Female',
                'biography' => 'Kristen Jaymes Stewart is an American actress. The world\'s highest-paid actress in 2012, she has received various accolades, including a British Academy Film Award and a César Award, in addition to nominations for an Academy Award and a Golden Globe Award.',
                'dobActor' => '1962-03-07',
                'pobActor' => 'Syracuse, New York, United States',
                'imgActor' => 'kristenstewart.jpg',
                'popularity' => '4.6',
            ],
            [
                'name' => 'Emma Watson',
                'gender' => 'Female',
                'biography' => 'Emma Charlotte Duerre Watson is an English actress and activist. Known for her roles in both blockbusters and independent films, as well as for her women\'s rights work, she has received a selection of accolades, including a Young Artist Award and three MTV Movie Awards.',
                'dobActor' => '1962-03-07',
                'pobActor' => 'Syracuse, New York, United States',
                'imgActor' => 'emmawatson.png',
                'popularity' => '4.6',
            ],
            [
                'name' => 'Sam Worthington',
                'gender' => 'Male',
                'biography' => 'Samuel Henry John Worthington is an Australian actor. He is best known for playing Jake Sully in the Avatar franchise, Marcus Wright in Terminator Salvation, and Perseus in Clash of the Titans and its sequel Wrath of the Titans.',
                'dobActor' => '1962-03-07',
                'pobActor' => 'Syracuse, New York, United States',
                'imgActor' => 'samworthington.jpg',
                'popularity' => '4.6',
            ]
        ]);
    }
}
