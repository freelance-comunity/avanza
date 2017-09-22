<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->delete();

    	DB::table('branches')->insert([
    		[
    			'name' => 'SUC MATRIZ',
    			'phone' => '000000000',
    			'address' => 'TGZ',
    			'latitude' => '0',
    			'length' => '0',
    			'region_id' => '1'
    		],
            [
                'name' => 'SUC SAN CRISTOBAL',
                'phone' => '000000000',
                'address' => 'SAN CRISTOBAL ',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '3'
            ],
            [
                'name' => 'SUC 24 DE JUNIO',
                'phone' => '000000000',
                'address' => 'TGZ',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC BERRIOZABAL',
                'phone' => '000000000',
                'address' => 'BERRIOZABAL',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC COMITAN',
                'phone' => '000000000',
                'address' => 'COMITAN',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '3'
            ],
            [
                'name' => 'SUC NICOLAS V',
                'phone' => '000000000',
                'address' => 'NICOLAS BRAVO',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '3'
            ],
            [
                'name' => 'SUC PANTEPEC',
                'phone' => '000000000',
                'address' => 'PANTEPEC',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '1'
            ],
            [
                'name' => 'SUC RAYON',
                'phone' => '000000000',
                'address' => 'RAYON',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '1'
            ],
            [
                'name' => 'SUC SAN FERNANDO',
                'phone' => '000000000',
                'address' => 'SAN FERNANDO',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '4'
            ],
            [
                'name' => 'SUC TAPALAPA',
                'phone' => '000000000',
                'address' => 'TAPALAPA',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC TAPILULA',
                'phone' => '000000000',
                'address' => 'TAPILULA',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '1'
            ],


    	]);
    }
}
