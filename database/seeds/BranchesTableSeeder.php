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
                'phone' => '9671234567',
                'address' => 'TGZ',
                'latitude' => '0',
                'length' => '0',
                'region_id' => '2'
            ],

    	]);
    }
}
