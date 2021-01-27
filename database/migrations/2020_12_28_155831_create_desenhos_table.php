<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesenhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('desenhos', function (Blueprint $table) {
            $table->increments('id');               // Serve apenas para o BD
            $table->string('numero')->unique();   //Numero NSD           
            $table->string('pai')->nullable();   //Numero NSD           
            $table->string('alias')->nullable()->unique();   //Numero de cliente            
            $table->string('descricao');           
            $table->string('material');           
            $table->string('peso');           
            $table->string('tratamento');           
            $table->string('observacoes')->nullable();
            $table->integer('anexo_id')
                    ->nullable()
                    ->unsigned();
            $table->integer('user_id')
                    ->unsigned();
            
            //Referencia externa para projetos cadastrados
            $table->integer('projeto_id')->nullable()->unsigned();
            $table->foreign('projeto_id')
                    ->references('id')
                    ->on('projetos')
                    ->onDelete('cascade');
            
            $table->foreign('anexo_id')
                    ->references('id')
                    ->on('arquivos')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('desenhos');
    }
}
