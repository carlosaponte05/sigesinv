<?php

use Illuminate\Database\Seeder;

class MaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('materiales')->insert([
            'nombre'      => 'Libreta 100 hojas',
            'caracteristica'   => 'De una línea',
            'existencia' => '0',
            'unidad'  => 'Bulto',
            'precio_ind' => 3600,
            'precio_und' => 20000000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Cuaderno 100 hojas',
            'caracteristica'   => 'De una línea',
            'existencia' => '0',
            'unidad'  => 'Bulto',
            'precio_ind' => 2800,
            'precio_und' => 20000000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Lápiz Mongol',
            'caracteristica'   => 'Caja de 10',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 380,
            'precio_und' => 600000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Sacapunta Metal',
            'caracteristica'   => 'inoxidable',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 280,
            'precio_und' => 70000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Sacapunta Depósito',
            'caracteristica'   => 'De plástico',
            'existencia' => '0',
            'unidad'  => 'Bulto',
            'precio_ind' => 520,
            'precio_und' => 80000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Borrador Nata',
            'caracteristica'   => 'mediano',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 250,
            'precio_und' => 20000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Juego de Escuadra',
            'caracteristica'   => 'Tamaño mediano',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 980,
            'precio_und' => 540000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Caja de Colores Solita',
            'caracteristica'   => '12 colores',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 2800,
            'precio_und' => 28000000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Colores Papermate',
            'caracteristica'   => '12 colores',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 2800,
            'precio_und' => 2800000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Colores Alpha',
            'caracteristica'   => '12 colores',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 1600,
            'precio_und' => 1600000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Colores de Cera',
            'caracteristica'   => '10 colores',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 1250,
            'precio_und' => 1250000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Plastilina 6 colores',
            'caracteristica'   => 'Tamaño mediano',
            'existencia' => '0',
            'unidad'  => 'Paquete',
            'precio_ind' => 490,
            'precio_und' => 4900000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Plastilina 10 colores',
            'caracteristica'   => 'Tamaño mediano',
            'existencia' => '0',
            'unidad'  => 'Paquete',
            'precio_ind' => 980,
            'precio_und' => 980000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Engrapadora metal',
            'caracteristica'   => '10 cm corrugada',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 4600,
            'precio_und' => 4600000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Caja de Grapas',
            'caracteristica'   => 'corrugadas',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 1900,
            'precio_und' => 1900000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);

        \DB::table('materiales')->insert([
            'nombre'      => 'Caja de clips',
            'caracteristica'   => '100 clips',
            'existencia' => '0',
            'unidad'  => 'Caja',
            'precio_ind' => 500,
            'precio_und' => 500000,
            'stock_min' => 5,
            'stock_max' => 100
        ]);
    }
}
