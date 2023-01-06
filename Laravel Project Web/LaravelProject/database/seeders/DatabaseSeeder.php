<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MovieSeeder::class
            // PublishersSeeder::class,
            // BookSeeder::class,
            // CategoriesSeeder::class,
            // BookCategorySeeder::class,
        ]);
    }
}
