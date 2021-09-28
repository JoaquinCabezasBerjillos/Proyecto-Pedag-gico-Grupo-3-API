<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialClinicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HistorialClinico', function (Blueprint $table) {

        $table->id();
        $table->foreignId('mascota_id'); 
        $table->foreignId('consulta_id');

        // $table->foreing('consulta_id')->references('id')->on('consultas'); //¿se pueden tener dos claves foraneas?
        // $table->foreing('mascota_id')->references('id')->on('mascotas');
            
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
        //
    }
}
