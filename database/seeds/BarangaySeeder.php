<?php

use Illuminate\Database\Seeder;
use App\Tbl_town;
use App\Tbl_barangay;
class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   $alaminos = Tbl_town::findOrFail(1);
 
	//alaminos
	Tbl_barangay::create([
	'barangay_name' => 'San Benito',
	'tbl_town_id' 	=> $alaminos->id,
	]);

    Tbl_barangay::create([
    'barangay_name' => 'San Andres',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Ildefonso',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Agustin',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Santa Rosa',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Gregorio',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Barangay II (Pob.)',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Palma',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Barangay IV (Pob.)',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Roque',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Barangay I (Pob.)',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Juan',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Barangay III (Pob.)',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Del Carmen',
    'tbl_town_id'   => $alaminos->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Miguel',
    'tbl_town_id'   => $alaminos->id,
    ]);




    //bay
    $bay = Tbl_town::findOrFail(2);

    Tbl_barangay::create([
    'barangay_name' => 'San Antonio',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Bitin',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Isidro',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Tagumpay',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Masaya',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Santo Domingo',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Agustin (Pob.)',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Maitim',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Santa Cruz',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Tranca',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Paciano Rizal',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Dila',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Puypuy',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'Calo',
    'tbl_town_id'   => $bay->id
    ]);

    Tbl_barangay::create([
    'barangay_name' => 'San Nicolas (Pob.)',
    'tbl_town_id'   => $bay->id
    ]);

    $binan = Tbl_town::findorFail(3);

    Tbl_barangay::create([
    'barangay_name' =>  'Tubigan',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Domingo',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Nino',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ganado',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Binan(Poblacion)',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bungahan',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  ' De La Paz',
    'tbl_town_id'   =>  $binan->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Soro Soro',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malaban',
    'tbl_town_id'   =>  $binan->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Sana Vicente',
    'tbl_town_id'   =>  $binan->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Langkiwa',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Zapote',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Casile',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Manpalasan',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Timbao',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Francisco (Halang)',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Canlalay',
    'tbl_town_id'   =>  $binan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Santo Tomas(Calabuso)',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Loma',
    'tbl_town_id'   =>  $binan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $binan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Platero',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malamig',
    'tbl_town_id'   =>  $binan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Jose',
    'tbl_town_id'   =>  $binan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion',
    'tbl_town_id'   =>  $binan->id,
    ]);


    $cabuyao = Tbl_town::findorFail(4);
        

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Uno (Pob)',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Diezmo',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Pittland',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bigaa',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Banlic',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Niugan',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pulo',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Marinig',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Gulod',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mamatid',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sala',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baclaran',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Casile',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Banaybanay',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Butong',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baranagay Tres(Pob)',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Dos(Pob)',
    'tbl_town_id'   =>  $cabuyao->id,
    ]);

    $calamba = Tbl_town::findorFail(5);


    Tbl_barangay::create([
    'barangay_name' =>  'Palo-Alto',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banadero',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Palingon',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Barangay 5 (Pob)',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Tulo',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Mapagong',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Juan',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Priza',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bunggo',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Punta',
    'tbl_town_id'   =>  $calamba->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Burol',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Laguerta',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Puting Lupa',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Homalan',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Batino',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Camaligan',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ulango',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mabato',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Cristobal',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Lawa',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Looc',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Banlic',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Saimsim',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  ' MAjada Labas',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barandal',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Turbina',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lecheria',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sarpiruhin',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Makiling',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    Tbl_barangay::create([
    'barangay_name' =>  'Mayapa',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Masili',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Bagong KaLsada',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paciano Rizal',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Sirang Lupa',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'La Mesa',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Jose',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay 2 (Pob)',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Bucal',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Pansol',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Parian',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Bubuyan',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Sucol',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Canlubang',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Lingga',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Real',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Halang',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kay-Anlog',
    'tbl_town_id'   =>  $calamba->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barngay 6 (Pob)',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Barangay 3 (Pob)',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Barangay 1 (Pob)',
    'tbl_town_id'   =>  $calamba->id,
    ]);
    
    //Caluan

    $caluan = Tbl_town::findorFail(6);


    Tbl_barangay::create([
    'barangay_name' =>  'Limao',
    'tbl_town_id'   =>  $caluan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Silangan (Pob)',
    'tbl_town_id'   =>  $caluan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Paliparan',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lamot 1',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Tomas',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dayap',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balayhangin',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Perez',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mabacan',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Masiit',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Imok',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Prinza',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Hanggan',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kanluran (Pob)',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bangyas',
    'tbl_town_id'   =>  $caluan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lamot 2',
    'tbl_town_id'   =>  $caluan->id,
    ]);


    //Cavinti
    $cavinti = Tbl_town::findorFail(7);
    Tbl_barangay::create([
    'barangay_name' =>  'Mahipon',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Duhat',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cansuso',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bukal',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Inao-Awan',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Udia',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Layasin',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paowin',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Layug',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bulajo',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Anglas',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Silimsim',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tabatid',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Labayo',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bangco',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Silangan Talaongan',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kanluran Talaongan',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sumucab',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Unknown Brgy',
    'tbl_town_id'   =>  $cavinti->id,
    ]);

    //Famy

    $Famy= Tbl_town::findorFail(8);
    Tbl_barangay::create([
    'barangay_name' =>  'Batuhan',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tunhac',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kapatalan',
    'tbl_town_id'   =>  $Famy->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Salangbato',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Damayan (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balitoc',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Asana (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Calumpang(Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Magdalo (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maate',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Liyang',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kataypuanan',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bacong-Sigsigan',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Minayutan',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cuebang Bato',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bulihan',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mayatba',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Caballero (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Pag-Asa (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Banaba (Pob.)',
    'tbl_town_id'   =>  $Famy->id,
    ]);

    //Kalayaan

    $Kalayaan= Tbl_town::findorFail(9);


    Tbl_barangay::create([
    'barangay_name' =>  'Longos',
    'tbl_town_id'   =>  $Kalayaan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $Kalayaan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Juan (Pob)',
    'tbl_town_id'   =>  $Kalayaan->id,
    ]);

    //Liliw

    $Liliw= Tbl_town::findorFail(10);


    Tbl_barangay::create([
    'barangay_name' =>  'Maslun (Pob.)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Masikap (Pob.)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang San Roque',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pag-Asa (Pob.)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Taykin',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Rizal (Pob.)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Novaliches',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bongkol',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Laguan',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malabo-Kalantukan',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dita',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Laquin',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bubukal',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bayate',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang San Roque',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Silangang Bukal',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Sungi',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Palina',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cabuyao',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Culoy',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kanlurang Bukal',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mojon',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Calumpang',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Anyo (Pob.)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Palina',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tuy-Baanan',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Taykin',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Daniw (Danliw)',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Palayan',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dagatan',
    'tbl_town_id'   =>  $Liliw->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Sungi',
    'tbl_town_id'   =>  $Liliw->id,
    ]);


    //Los Baños

    $Los_Baños= Tbl_town::findorFail(11);

    Tbl_barangay::create([
    'barangay_name' =>  'Putho Tuntungin',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lalakay',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Silang',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bambang',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Timugan (Pob.))',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bayog',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maahas',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malinta',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Anos',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mayondon',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tadiak',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Batong Malake',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baybayin (Pob.)',
    'tbl_town_id'   =>  $Los_Baños->id,
    ]);

    //Luisiana

    $Luisiana = Tbl_town::findorFail(12);

    Tbl_barangay::create([
    'barangay_name' =>  'San Diego',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Tomas',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baybayin (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baybayin (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone V (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Salvador',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone VI (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'De La Paz',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone IV (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone VII(Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Roque',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baybayin (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone VIII (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Luis',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Juan',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone III (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Pablo',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Buenaventura',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Jose',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Domingo',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone I (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay Zone II (Pob.)',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Pedro ',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Rafael',
    'tbl_town_id'   =>  $Luisiana->id,
    ]);

    //Lumban

    $Lumban = Tbl_town::findorFail(13);

    Tbl_barangay::create([
    'barangay_name' =>  'Wawa',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Premira Pulo (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Segunda Parang (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Niño (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balimbingan (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Caliraya',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maracta (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maytalang I',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balubad',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Segunda Pulo (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Silang',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Premira Parang (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Concepcion',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maytalang II',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lewin',
    'tbl_town_id'   =>  $Lumban->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Salac (Pob.)',
    'tbl_town_id'   =>  $Lumban->id,
    ]);


    //Mabitac

    $Mabitac = Tbl_town::findorFail(14);

    Tbl_barangay::create([
    'barangay_name' =>  'Nanguma',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pag-Asa (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Miguel',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Libis Ng Nayon (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sinagtala (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Amuyong',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Numero',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bayanihan (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maligaya (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paagahan',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Matalatala',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lambac (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lucong',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Masikap (Pob.)',
    'tbl_town_id'   =>  $Mabitac->id,
    ]);

    //Magdalena

    $Magdalena = Tbl_town::findorFail(15);


    Tbl_barangay::create([
    'barangay_name' =>  'Buenavista',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Butnong',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tipunan',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Butnong',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bucal',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balanac',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malaking Ambling',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bungkol',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maravilla',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Atingay',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Atingay',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilog',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tanawan',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Buo',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Halayhayin',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cigaras',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Salasad',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sabang',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Munting Ambling',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baanan',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Burlungan',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malinao',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Alipit',
    'tbl_town_id'   =>  $Magdalena->id,
    ]);


    // Majayjay

    $Majayjay = Tbl_town::findorFail(16);



    Tbl_barangay::create([
    'barangay_name' =>  'Santa Catalina (Pob.)',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Malinao',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Banga',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Munting Kawayan',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bakia',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bukal',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Coralao',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Taytay',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Panglan',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Pook',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banti',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Amonoy',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Burol',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'May-it',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Burgos',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Roque',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ibabang Bayucain',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Rizal',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Tanawan',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balanac',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balayong',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banilad',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bitaoy',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Villa Nogales',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Bayucain',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Panalaban',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Isabang',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Francisco (Pob.)',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Origuel (Pob.)',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ilayang Banga',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Botocan',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Olla',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Oobi',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Talortor',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Miguel (Pob.)',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Suba',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Gagalot',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Piit',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Pangil',
    'tbl_town_id'   =>  $Majayjay->id,
    ]);

    //Nagcarlan

    $Nagcarlan = Tbl_town::findorFail(17);

    Tbl_barangay::create([
    'barangay_name' =>  'Silangan Ilaya',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Talangan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Alibungbungan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Manaol',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Wakat',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Palina',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Alumbrado',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Silangan Kabubuhayan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Silangan Napapatid',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bukal',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Kanluran Lazaan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banilad',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bangcuro',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Sabang',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Oples',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balimbing',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Lawaguin',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Kanluran Kabubuhayan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Buhanginan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bunga',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Labangan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Talahib',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Cabuyew',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balayong',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Buenavista',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Sulsuguin',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Lagulo',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Maiit',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Tipacan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bayaquitos',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Nagcalbang',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Yukos',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion II(Pob.)',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion III (Pob.)',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banago',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'San Francisco',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Malaya',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Poblacion I(Pob.)',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Banca-banca',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Buboy',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Silangan Lazaan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Malinao',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Maravilla',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Palayan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Taytay',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Abo',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Bambang',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Santa Lucia',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Sinipian',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balinacon',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Sibulan',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Calumpang',
    'tbl_town_id'   =>  $Nagcarlan->id,
    ]);


    //Paete

    $Paete = Tbl_town::findorFail(18);



    Tbl_barangay::create([
    'barangay_name' =>  'Ibaba del Norte(Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ibaba del Sur(Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ilaya del Sur(Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Ermita (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagumbayan (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ilaya del Norte (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maytoong (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Quinale (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bangkusay (Pob.)',
    'tbl_town_id'   =>  $Paete->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Unknown Bgy.',
    'tbl_town_id'   =>  $Paete->id,
    ]);




    //Pagsanjan

    $Pagsanjan = Tbl_town::findorFail(19);


    Tbl_barangay::create([
    'barangay_name' =>  'Panagsanjan',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Isidro',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Magdapio',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Calusiche',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Lambac',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Anibong',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Layugan',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Maulawin',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Buboy',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cabanbanan',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sampaloc',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Biñan',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II (Pob.)',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sabang',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dingin',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay I (Pob.)',
    'tbl_town_id'   =>  $Pagsanjan->id,
    ]);



    //Pakil

    $Pakil = Tbl_town::findorFail(20);


    Tbl_barangay::create([
    'barangay_name' =>  'Burgos (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tavera (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Casa Real',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dorado',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Matikiw',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Baño (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sanay',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Gonzales (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Rizal (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Banilan',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Taft (Pob.)',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kabulusan',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Casinsin',
    'tbl_town_id'   =>  $Pakil->id,
    ]);

    //Pakil

    $Pangil = Tbl_town::findorFail(21);


    Tbl_barangay::create([
    'barangay_name' =>  'Dambo',
    'tbl_town_id'   =>  $Pangil->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Jose (Pob.)',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Sulib',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Balian',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Natividad (Pob.)',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Mabato-Azufre (Pob.)',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Isla (Pob.)',
    'tbl_town_id'   =>  $Pangil->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Galalan',
    'tbl_town_id'   =>  $Pangil->id,
    ]);




    //Pila

    $Pila= Tbl_town::findorFail(22);

    Tbl_barangay::create([
    'barangay_name' =>  'Aplaya',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pansol',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Clara Norte (Pob.)',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Masico',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bulilan Norte (Pob.)',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tubuan',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Miguel',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Concepcion',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mojon',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bukal',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Pook',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pinagbayanan',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Linga',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Labuin',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bulilan Sur (Pob.)',
    'tbl_town_id'   =>  $Pila->id,
    ]);
    
    Tbl_barangay::create([
    'barangay_name' =>  'Santa Clara Sur (Pob.)',
    'tbl_town_id'   =>  $Pila->id,
    ]);

    //Rizal

    $Rizal= Tbl_town::findorFail(23);

    Tbl_barangay::create([
    'barangay_name' =>  'Tala',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pook',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'East Poblacion',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Laguan',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Entablado',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Antipolo',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Talaga',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tuy',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'West Poblacion',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paule 2',
    'tbl_town_id'   =>  $Rizal->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paule 1',
    'tbl_town_id'   =>  $Rizal->id,
    ]);


    //San Pablo City

    $San_Pablo_City= Tbl_town::findorFail(24);

    Tbl_barangay::create([
    'barangay_name' =>  'Paule 1',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Cristobal',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio 2',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Vicente',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Mateo',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Maria',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Magdalena',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Pedro',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Catalina',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dolores',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-F (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Joaquin',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-D (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Atisan',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-D (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay V-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VI-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay V-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay IV-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay V-D (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-F (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VII-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VII-E (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VII-D (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'an Lucas 2',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Nicolas',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Paule 1',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Niño',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Gabriel',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Jose',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Filomina',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Maria',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Bartolome',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Miguel',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Angel',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-E (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Marcos',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Del Remedio',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Gregorio',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Lucas 1',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Concepcion',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Diego',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Ana',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bautista',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio 1',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Cruz',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Elena',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santiago 1',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VI-D (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Pook VI-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'san Lorenzo',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Bayan II-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'san Buenaventura',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'san Isidro',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Rafael',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Juan',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Isabel',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Roque',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Cristo',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Ignacio',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'santisimo Rosario',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Crispin',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Francisco',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Monica',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay I-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santiago II',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VI-E (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VI-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santa Veronica',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-E (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Soledad',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay II-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay I-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay V-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VII-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay IV-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay IV-C (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay III-A (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Barangay VII-B (Pob.)',
    'tbl_town_id'   =>  $San_Pablo_City->id,
    ]);

//San Pedro

    $San_Pedro= Tbl_town::findorFail(25);

    Tbl_barangay::create([
    'barangay_name' =>  'San Roque',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Sampaguita Village',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Cuyab',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Landayan',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Silang',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Niño',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'United Better Living',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Antonio',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Vicente',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'United Bayanihan',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Langgam',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Laram',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Magsaysay',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'G.S.I.S',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Estrella',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Narra',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Nueva',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Riverside',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'Poblacion',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);

Tbl_barangay::create([
    'barangay_name' =>  'calendola',
    'tbl_town_id'   =>  $San_Pedro->id,
    ]);


//Santa Cruz (Capital)

    $Santa_Cruz= Tbl_town::findorFail(26);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Angel Sur',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

     Tbl_barangay::create([
    'barangay_name' =>  'San Pablo Sur',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'San Pablo Norte',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay IV',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Jasaan',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay V',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Alipit',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Gatid',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Santo Angel Norte',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Santisima Cruz',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Santo Angel Central',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'San Juan',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Labuin',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'San Jose',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Oogong',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Calios',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Duhat',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Patimbao',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Pagsawitan',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Bagumbayan',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Palasan',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Bubukal',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Malinao',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay II',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay I',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay III',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Unknown BRGY',
    'tbl_town_id'   =>  $Santa_Cruz->id,
    ]);


//Santa Maria

    $Santa_Maria= Tbl_town::findorFail(27);

    Tbl_barangay::create([
    'barangay_name' =>  'Caloocan',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

     Tbl_barangay::create([
    'barangay_name' =>  'Bagumbayan',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Jose Rizal',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Bubukal',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay III (Pob.)',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Parang ng Buho',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Cueva',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Masinao',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay II (Pob.)',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Inayapan',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay IV (Pob.)',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Mataling-Ting',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Jose Laurel,Sr.',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Talangka',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Cambuja',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Tungkod',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Coralan',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Kayhakat',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Calangay',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Adia',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Barangay I (Pob.)',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Santiago',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Pao-o',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Bagong Pook',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);

 Tbl_barangay::create([
    'barangay_name' =>  'Macasipac',
    'tbl_town_id'   =>  $Santa_Maria->id,
    ]);


//Santa Rosa

    $Santa_Rosa = Tbl_town::findorFail(28);

    Tbl_barangay::create([
    'barangay_name' =>  'Sinalhan',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dita',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Don Jose',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Aplaya',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Macabling',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pook',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pulong Santa Cruz',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Ibaba',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kanluran',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Labas',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malilit',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Dila',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Tagapo',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Caingin',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Market Area',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Balibago',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Malusak',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Santo Domingo',
    'tbl_town_id'   =>  $Santa_Rosa->id,
    ]);


    //Siniloan

    $Siniloan= Tbl_town::findorFail(29);

    Tbl_barangay::create([
    'barangay_name' =>  'Llavac',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);


    Tbl_barangay::create([
    'barangay_name' =>  'Magsayay',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Buhay',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagong Pag-Asa',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Laguio',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Bagumbarangay',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Halayhayin',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Pandeno',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Kapatalan',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Macatad',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Salubungan',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mendiola',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Wawa',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Acevida',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Gen. Luna',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'P. Burgos',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'G. Redor',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Liyang',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Mayatba',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'J. Rizal',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Unknown Brgy',
    'tbl_town_id'   =>  $Siniloan->id,
    ]);


    //Victoria

    $Victoria= Tbl_town::findorFail(30);

    Tbl_barangay::create([
    'barangay_name' =>  'Pagalangan',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Felix',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Roque',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Benito',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Masapang',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Nanhaya',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Daniw',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'San Francisco',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Banca-banca',
    'tbl_town_id'   =>  $Victoria->id,
    ]);

    Tbl_barangay::create([
    'barangay_name' =>  'Unknown Brgy',
    'tbl_town_id'   =>  $Victoria->id,
    ]);


    	   
        
    }
}
