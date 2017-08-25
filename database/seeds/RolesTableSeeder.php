<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            [
            'name' => 'administrador',
            'display_name' => 'administrador',
            'description' => 'PERSONA QUE ADMINISTRA Y EJECUTA LA OPERACIÓN DIARIA DE LA EMPRESA, CON TODAS LAS FACULTADES.'
            ],
            [
            'name' => 'auditor',
            'display_name' => 'auditor',
            'description' => 'PERSONA QUE SUPERVISA LAS OPERACIONES DE LA EMPRESA, FACULTAD PARA VER INFORMACION Y REALIZAR ADECUACIONES EN BASE A RESULTADOS DE SU TRABAJO.'
            ],
            [
            'name' => 'director-general',
            'display_name' => 'director-general',
            'description' => 'PERSONA QUE ADMINISTRA Y EJECUTA LA OPERACIÓN DIARIA DE LA EMPRESA, CON TODAS LAS FACULTADES.'
            ],
            [
            'name' => 'ejecutivo-de-credito',
            'display_name' => 'ejecutivo-de-credito',
            'description' => 'RESPONSABLE DE PROMOCIONAR, Y ATENDER A CLIENTES.'
            ],
            [
            'name' => 'gerente',
            'display_name' => 'gerente',
            'description' => 'RESPOSANBLE DE LA OPERACIÓN DIARIA DE LOS CREDITOS, FACULTADES PARA CREAR, VER, AUTORIZAR O DESECHAR OPERACIONES.'
            ],
            [
            'name' => 'gestor-de-cobranza',
            'display_name' => 'gestor-de-cobranza',
            'description' => 'RESPONSABLE DE REALIZAR ACCIONES DE COBRANZA DE LA CARTERA VENCIDA O EN ATRASO.'
            ],
            [
            'name' => 'socio',
            'display_name' => 'socio',
            'description' => 'PERSONA QUE PARTICIPA EN INVERSION DE RECURSOS, UNICAMENTE ESTA INTERESADO EN REPORTES GENERALES DEL CARTERA.'
            ],
            [
            'name' => 'supervisor',
            'display_name' => 'supervisor',
            'description' => 'RESPONSABLE DE SUPERVISAR LOS CREDITOS ANTES DE SU OTORGAMIENTO Y POSTERIORES AL MISMO, FACULTADES PARA VER OPERACIONES.'
            ]
            ]);
    }
}
