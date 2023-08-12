<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestaoRecebimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestao_recebimentos', function (Blueprint $table) {
            $table->id();       
            
            $table->string('descricao_recebimento',60)->nullable();
            $table->integer('tipo_documento')->nullable();
            $table->integer('documento_id')->nullable();            
            
            $table->BigInteger('forma_pagto_id')->unsigned()->nullable();
            $table->foreign("forma_pagto_id")->references("id")->on("forma_pagtos");
            $table->date('data_recebimento')->nullable();
            
            $table->string('numero_documento',60)->nullable();
            $table->decimal('valor_original',10,2)->nullable()->default(0);
            $table->decimal('valor_recebido', 10,2)->default(0);
            $table->decimal('juros',10,2)->nullable()->default(0);
            $table->decimal('multa',10,2)->nullable()->default(0);
            $table->string('observacao',90)->nullable();
            $table->decimal('desconto',10,2)->nullable()->default(0);            
            
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
        Schema::dropIfExists('gestao_recebimentos');
    }
}
