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
                'nomenclature' =>'CSMTZ',
    			'latitude' => '0',
    			'length' => '0',
    			'region_id' => '5'
    		],
            [
                'name' => 'SUC SAN CRISTOBAL',
                'phone' => '000000000',
                'address' => 'SAN CRISTOBAL ',
                'nomenclature' =>'CSCSR',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '3'
            ],
            [
                'name' => 'SUC TEOPISCA',
                'phone' => '000000000',
                'address' => 'TEOPISCA ',
                'nomenclature' =>'CSTPC',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '3'
            ],
            [
                'name' => 'SUC 24 DE JUNIO',
                'phone' => '000000000',
                'address' => 'TGZ',
                'nomenclature' =>'CSTXT',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC BERRIOZABAL',
                'phone' => '000000000',
                'address' => 'BERRIOZABAL',
                'nomenclature' =>'CSBRB',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '4'
            ],
            [
                'name' => 'SUC RAYON',
                'phone' => '000000000',
                'address' => 'RAYON',
                'nomenclature' =>'CSRYN',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '1'
            ],
            [
                'name' => 'SUC SAN FERNANDO',
                'phone' => '000000000',
                'address' => 'SAN FERNANDO',
                'nomenclature' =>'CSSFD',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '4'
            ],
            [
                'name' => 'SUC JIQUIPILAS',
                'phone' => '000000000',
                'address' => 'JIQUIPILAS',
                'nomenclature' =>'CSJPS',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC OCOZOCOAUTLA',
                'phone' => '000000000',
                'address' => 'OCOZOCOAUTLA',
                'nomenclature' =>'CSOCZ',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],
            [
                'name' => 'SUC SUCHIAPA',
                'phone' => '000000000',
                'address' => 'SUCHIAPA',
                'nomenclature' =>'CSSCP',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],

    	]);
    }
}
