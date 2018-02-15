<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('users')->delete();
        DB::table('clients')->delete();
    	DB::table('users')->insert([
    		'name' => 'ADMIN',
            'father_last_name' => 'ADMIN',
            'mother_last_name' => 'ADMIN',
            'birthdate' => '1992-06-23',
            'birth_entity' => 'CHIAPAS',
            'place_of_birth' => 'TUXTLA GUTIÉRREZ',
            'gender' => 'HOMBRE',
            'civil_status' => 'SOLTERO(A)',
            'country_of_birth' => 'MÉXICO',
            'nationality' => 'MEXICANA',
            'scholarship' => 'LICENCIATURA',
            'phone_1' => '0000000000',
            'phone_2' => 'NO TIENE',
            'avatar' => 'default.png',
    		'email' => 'webmaster@crediefectivo.mx',
    		'password' => bcrypt('secret'),
            'branch_id' => '1',
            'region_id' => '5',
    		]);
    }
}
