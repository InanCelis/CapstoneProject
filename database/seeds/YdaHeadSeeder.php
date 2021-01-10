<?php

use Illuminate\Database\Seeder;
use App\Tbl_yda_head;
class YdaHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tbl_yda_head::create([
	    'name'		=> 'MARLON V. MANGAHAS',
	    'position'	=> 'EA-IV/YDA Head'
	    ]);
    }
}
