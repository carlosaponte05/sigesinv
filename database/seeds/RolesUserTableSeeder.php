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
            'permissions' => '{"user.create":true,"user.update":true,"user.delete":true,"user.view":true,"post.create":true,"post.update":true,"post.delete":true,"post.view":true}',
            'description' => 'Acceso Completo'

        ]);
    }
}
