<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciclassusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciclassus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep_coleta');
            $table->string('rua_coleta');
            $table->string('numero_coleta');
            $table->string('bairro_coleta');
            $table->string('cidade_coleta');
            $table->string('estado_coleta');
            $table->string('data_coleta');
            $table->string('horario_coleta');
            $table->string('status_agendamento');
            $table->string('descricao_residuo');
            $table->integer('id_donor')->unsigned();
            $table->foreign('id_donor')->references('id')->on('users');
            $table->integer('id_recycler')->unsigned();
            $table->foreign('id_recycler')->references('id')->on('users');
            $table->integer('id_recycling');
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
        Schema::dropIfExists('reciclassus');
    }
}
