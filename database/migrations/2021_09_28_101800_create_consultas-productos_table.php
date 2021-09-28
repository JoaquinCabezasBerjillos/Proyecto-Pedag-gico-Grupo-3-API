<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->bigInteger('id');
        $table->bigInteger('consulta_id');
        $table->int('producto_id');
        $table->text('descripcion');

        $table->foreing('productos_id')->references('id')->on('productos'); //se pueden tener dos claves foraneas?
        $table->foreing('consulta_id')->references('id')->on('consutas');
            
        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
