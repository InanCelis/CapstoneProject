<?php

use Illuminate\Database\Seeder;
use App\Tbl_event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tbl_event::create([
        	'event_name'   => '3D Mural Art',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Anilag Color Run',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Anilag Cosplay',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Anilag Singing Idol',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Bandanilag',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Dance Revolution',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Laguna Gay Queen',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Laguna Lesbian King',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Mardi Gay Queen',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
        	'event_name'   => 'Water Color Competition',
            'event_status' => 'open'
        ]);

        Tbl_event::create([
            'event_name'   => 'Anilag Singing Idol Kids',
            'event_status' => 'open'
        ]);

    }
}
