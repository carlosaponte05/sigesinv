<?php

use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proveedores')->insert([
            'razon_social'      => 'Comercial Regional 2000 C.A.',
            'rif'   => 'J-87888999',
            'telefono' => '02438778887'
        ]);

        \DB::table('proveedores')->insert([
            'razon_social'      => 'Papelería Pestana C.A.',
            'rif'   => 'J-87111999',
            'telefono' => '02431844897'
        ]);

        \DB::table('proveedores')->insert([
            'razon_social'      => 'Comercial Wif C.A.',
            'rif'   => 'J-1234443',
            'telefono' => '02439993454'
        ]);
    }
}
