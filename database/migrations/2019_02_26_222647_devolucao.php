<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devolucao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkreservas')->unsigned();
            $table->foreign('fkreservas')->references('id')->on('reservas');
            
            $table->date('datadev');
            $table->string('horadev');
            $table->string('obs');
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
