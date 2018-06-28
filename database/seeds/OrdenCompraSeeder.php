<?php

use Illuminate\Database\Seeder;

class OrdenCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orden_compra')->insert([
            'fecha'      => '2018/05/12',
            'id_proveedor'   => 1,
            'codigo' => 'AAC123',
            'estado'  => 'Sin Aprobar'
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 1,
            'id_material'   => 1,
            'cantidad' => 20
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 1,
            'id_material'   => 2,
            'cantidad' => 10
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 1,
            'id_material'   => 3,
            'cantidad' => 20
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 1,
            'id_material'   => 1,
            'cantidad' => 20
        ]);
        //------------------------------------------
        \DB::table('orden_compra')->insert([
            'fecha'      => '2018/06/15',
            'id_proveedor'   => 2,
            'codigo' => 'AAC134',
            'estado'  => 'Sin Aprobar'
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 2,
            'id_material'   => 4,
            'cantidad' => 100
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 2,
            'id_material'   => 5,
            'cantidad' => 50
        ]);

        \DB::table('materiales_compra')->insert([
            'id_ordenc'      => 2,
            'id_material'   => 6,
            'cantidad' => 35
        ]);
    }
}
