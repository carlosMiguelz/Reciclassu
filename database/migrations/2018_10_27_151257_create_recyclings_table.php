<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecyclingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recyclings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('nome_residuo');
            $table->string('descricao_residuo');
            $table->string('quantidade_residuo');
            $table->string('cep_retirada');
            $table->string('rua_retirada');
            $table->string('numero_retirada');
            $table->string('bairro_retirada');
            $table->string('cidade_retirada');
            $table->string('estado_retirada');
            $table->float('valor');
            $table->string('status');
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
        Schema::dropIfExists('recyclings');
    }
}
