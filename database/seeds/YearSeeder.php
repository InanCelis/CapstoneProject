<?php

use Illuminate\Database\Seeder;
use App\Tbl_fetchyear;
class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tbl_fetchyear::create([
	    'year'=> '2020',
	    ]);
    }
}
