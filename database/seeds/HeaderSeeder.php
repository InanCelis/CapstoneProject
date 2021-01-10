<?php

use Illuminate\Database\Seeder;
use App\Tbl_pdf_header;
class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tbl_pdf_header::create([
	    'image'=> 'header.png',
	    ]);
    }
}
