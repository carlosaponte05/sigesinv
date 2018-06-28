<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('caracteristica',255);
            $table->integer('existencia');
            $table->enum('unidad',['Caja','Bulto','Resma','Paquete','Kilo']);
            $table->double('precio_ind',15,2);
            $table->double('precio_und',15,2);
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}
