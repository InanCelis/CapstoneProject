<?php

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
        $this->call([EventSeeder::class, TownSeeder::class, BarangaySeeder::class, YearSeeder::class, HeaderSeeder::class, YdaHeadSeeder::class, UserSeeder::class]);
    }
}
