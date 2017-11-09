<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
    		[
    			'code' => '001',
    			'name' => 'CREDIDIARIO25',
    			'interest_of_cup' => '25',
    			'ammount_max' =>'5000',
    			'ammount_min' =>'500',
    			'surcharge' =>'20'
    		],
    		[
    			'code' => '002',
    			'name' => 'CREDIDIARIO4',
    			'interest_of_cup' => '28',
    			'ammount_max' =>'3000',
    			'ammount_min' =>'500',
    			'surcharge' =>'20'
    		],
    		[
    			'code' => '003',
    			'name' => 'CREDISEMANA',
    			'interest_of_cup' => '15',
    			'ammount_max' =>'1000',
    			'ammount_min' =>'100',
    			'surcharge' =>'20'
    		],
    		[
    			'code' => '004',
    			'name' => 'DIARIO',
    			'interest_of_cup' => '15',
    			'ammount_max' =>'5000',
    			'ammount_min' =>'500',
    			'surcharge' =>'20'
    		],

    	]);


    }
}

 