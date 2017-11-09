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
    		'name' => 'Usuario',
            'father_last_name' => 'Comodin',
            'mother_last_name' => '...',
            'birthdate' => '1992-07-27',
            'birth_entity' => 'CHIAPAS',
            'place_of_birth' => 'TUXTLA GUTIÉRREZ',
            'gender' => 'HOMBRE',
            'civil_status' => 'SOLTERO(A)',
            'country_of_birth' => 'MÉXICO',
            'nationality' => 'MEXICANA',
            'scholarship' => 'LICENCIATURA',
            'phone_1' => '9612579168',
            'phone_2' => 'NO TIENE',
            'avatar' => '1502467645.jpeg',
    		'email' => 'usuario@mail.com',
    		'password' => bcrypt('secret'),
            'branch_id' => '1',
            'region_id' => '1',
    		]);
    }
}
