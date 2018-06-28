<?php

use Illuminate\Database\Seeder;

class RolesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            'slug' => 'Admin',
            'name' => 'Administrador',
            'permissions' => '{"user.create":true,"user.update":true,"user.delete":true,"user.view":true,"post.create":true,"post.update":true,"post.delete":true,"post.view":true,"materiales.create":true,"materiales.update":true,"materiales.delete":true,"materiales.view":true,"proveedores.create":true,"proveedores.update":true,"proveedores.delete":true,"proveedores.view":true,"orden_compra.create":true,"orden_compra.delete":true,"orden_compra.view":true,"orden_compra.aprobar":true,"orden_compra.cancelar":true,"orden_compra.ejecutar":true}',
            'description' => 'Acceso Completo'

        ]);

        \DB::table('roles')->insert([
            'slug' => 'Almacen',
            'name' => 'Jefe de Almacen',
            'permissions' => '{"user.view":true,"materiales.create":true,"materiales.update":true,"materiales.delete":true,"proveedores.view":true,"proveedores.create":true,"proveedores.update":true,"proveedores.delete":true,"proveedores.view":true,"orden_compra.create":true,"orden_compra.delete":true,"orden_compra.view":true,"orden_compra.cancelar":true,"orden_compra.ejecutar":true}',
            'description' => 'Acceso al Almacen'

        ]);
    }
}
