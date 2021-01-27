<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');               // Seve apenas para o BD
            $table->string('codigo')->unique();   //Numero NSD           
            $table->string('alias')->unique();   //Numero de cliente            
            $table->string('descricao');           
            $table->string('observacoes')->nullable();
            
            //Referencia externa para projetos cadastrados
            $table->integer('comessa_id')->nullable()->unsigned();
            $table->foreign('comessa_id')
                    ->references('id')
                    ->on('comessas')
                    ->onDelete('cascade');
            
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
        Schema::dropIfExists('projetos');
    }
}
