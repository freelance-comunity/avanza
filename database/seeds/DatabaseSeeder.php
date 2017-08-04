<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
    		'name' => 'socio',
    		'display_name' => 'socio',
    		'description' => 'Persona que participa en inversion de recursos, unicamente esta interesado en reportes generales del cartera',
    		]);
    }
}
