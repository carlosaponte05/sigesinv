<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_proveedor')->unsigned();
            $table->string('codigo',255);
            $table->enum('estado',['Sin Aprobar','Cancelada','Aprobada','Ejecutada']);

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
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
        Schema::dropIfExists('orden_compra');
    }
}
