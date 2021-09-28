<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasMedicamentosTable extends Migration
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
        $table->int('medicamento_id');
        $table->text('dosis');

        $table->foreing('consulta_id')->references('id')->on('consutas');
        $table->foreing('medicamentos_id')->references('id')->on('medicamentos'); //se pueden tener dos claves foraneas?
        
            
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
