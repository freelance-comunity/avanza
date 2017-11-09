<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        DB::table('permissions')->insert([
        	[
        	'name' => 'ver-graficas-de-monitoreo',
        	'display_name' => 'Ver graficas de monitoreo',
        	'description' => 'Permiso para visualizar las graficas de monitoreo del panel de administración',
        	'code' => 'INICIO'
        	],
        	[
        	'name' => 'usar-cotizador',
        	'display_name' => 'Usar cotizador',
        	'description' => 'Permiso para hacer uso del cotizador de crédito',
        	'code' => 'COTIZADOR'
        	],
        	[
        	'name' => 'crear-cliente',
        	'display_name' => 'Crear cliente',
        	'description' => 'Permiso para crear nuevo cliente',
        	'code' => 'CLIENTES'
        	],
        	[
        	'name' => 'ver-cliente',
        	'display_name' => 'Ver cliente',
        	'description' => 'Permiso para ver información de un cliente',
        	'code' => 'CLIENTES'
        	],
        	[
        	'name' => 'editar-cliente',
        	'display_name' => 'Editar cliente',
        	'description' => 'Permiso para editar datos de un cliente',
        	'code' => 'CLIENTES'
        	],
        	[
        	'name' => 'eliminar-cliente',
        	'display_name' => 'Eliminar cliente',
        	'description' => 'Permiso para eliminar un cliente definitivamente de la base de datos',
        	'code' => 'CLIENTES'
        	],
        	[
        	'name' => 'mis-cliente',
        	'display_name' => 'Ver mis clientes',
        	'description' => 'Permiso para que cada usuario vea a sus clientes',
        	'code' => 'CLIENTES'
        	],
        	[
        	'name' => 'ver-mis-creditos',
        	'display_name' => 'Ver mis creditos',
        	'description' => 'Permiso para que cada usuario vea sus créditos',
        	'code' => 'CRÉDITOS'
        	],
        	[
        	'name' => 'ver-todos-los-creditos',
        	'display_name' => 'Ver todos los creditos',
        	'description' => 'Permiso para ver todos los créditos',
        	'code' => 'CRÉDITOS'
        	],
        	[
        	'name' => 'ver-pagos',
        	'display_name' => 'Ver pagos',
        	'description' => 'Permiso para ver todos los pagos de los creditos',
        	'code' => 'PAGOS'
        	],
        	[
        	'name' => 'editar-mora',
        	'display_name' => 'Editar mora de los créditos',
        	'description' => 'Permiso para editar la mora de los créditos vencidos',
        	'code' => 'PAGOS'
        	],
        	[
        	'name' => 'sucursales',
        	'display_name' => 'Permiso sobre sucursales',
        	'description' => 'Permiso para crear, ver, editar y eliminar sucursales',
        	'code' => 'CONFIGURACIÓN'
        	],
        	[
        	'name' => 'personal',
        	'display_name' => 'Permiso sobre personal',
        	'description' => 'Permiso para crear, ver, editar y eliminar personal',
        	'code' => 'CONFIGURACIÓN'
        	],
        	[
        	'name' => 'roles',
        	'display_name' => 'Permiso sobre roles',
        	'description' => 'Permiso para crear, ver, editar y eliminar roles',
        	'code' => 'CONFIGURACIÓN'
        	],
        	[
        	'name' => 'permisos',
        	'display_name' => 'Permiso sobre permisos',
        	'description' => 'Permiso para crear, ver, editar y eliminar permisos',
        	'code' => 'CONFIGURACIÓN'
        	],
        	[
        	'name' => 'productos',
        	'display_name' => 'Permiso sobre productos',
        	'description' => 'Permiso para crear, ver, editar y eliminar productos',
        	'code' => 'CONFIGURACIÓN'
        	],
            [
            'name' => 'region',
            'display_name' => 'Permiso sobre regiones',
            'description' => 'Permiso para ver-crear-editar-eliminar regiones',
            'code' => 'CONFIGURACIÓN'
            ],
        	]);

    }
}
