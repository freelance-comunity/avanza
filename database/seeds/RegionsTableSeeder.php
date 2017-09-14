<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('regions')->delete();

    	DB::table('regions')->insert([
    		[
    			'name' => 'REGIÓN NORTE',
    			'area' => 'TAPILULA - RAYÓN - PANTEPEC - TAPALAPA'
    		],
    		[
    			'name' => 'REGIÓN CENTRO',
    			'area' => 'BERRIOZABAL - TERÁN - 24 DE JUNIO - SAN FERNANDO'
    		],
    		[
    			'name' => 'REGIÓN ALTOS',
    			'area' => 'SAN CRISTOBAL DE LAS CASAS - TEOPISCA -  NICOLAS BRAVO - COMITÁN'
    		],

    	]);

    }
}
