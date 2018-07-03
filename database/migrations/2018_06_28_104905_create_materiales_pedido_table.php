<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ordenp')->unsigned();
            $table->integer('id_material')->unsigned();
            $table->integer('cantidad');

            $table->foreign('id_ordenp')->references('id')->on('orden_pedido')->onDelete('cascade');
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
        Schema::dropIfExists('materiales_pedidos');
    }
}
