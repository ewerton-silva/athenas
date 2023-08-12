<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_recorrentes', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            
            $table->bigInteger('produto_recorrente_id')->unsigned();
            $table->foreign('produto_recorrente_id')->references('id')->on('produto_recorrentes');
            
            $table->bigInteger('cliente_id')->nullable()->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            
            $table->bigInteger('tipo_cobranca_id')->nullable()->unsigned();
            $table->foreign('tipo_cobranca_id')->references('id')->on('tipo_cobrancas'); 
            
            $table->bigInteger('status_id')->nullable()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
            
            $table->bigInteger('status_financeiro_id')->nullable()->unsigned();
            $table->foreign('status_financeiro_id')->references('id')->on('statuses');
            
            $table->BigInteger('classificacao_financeira_id')->nullable()->unsigned();
            $table->foreign('classificacao_financeira_id')->references('id')->on('classificacao_financeiras');
            
            $table->decimal('valor_recorrente', 10,2)->nullable();
            $table->decimal('valor_total', 10,2)->nullable();
            $table->decimal('valor_primeira_parcela', 10,2)->nullable();
            $table->date('primeiro_vencimento');
            $table->date("data_contrato");
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
        Schema::dropIfExists('venda_recorrencias');
    }
};
