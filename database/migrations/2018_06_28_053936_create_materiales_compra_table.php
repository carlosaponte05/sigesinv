<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ordenc')->unsigned();
            $table->integer('id_material')->unsigned();
            $table->integer('cantidad');

            $table->foreign('id_ordenc')->references('id')->on('orden_compra')->onDelete('cascade');
            $table->foreign('id_material')->references('id')->on('materiales')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiales_compra');
    }
}
