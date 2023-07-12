<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DentistesTaula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nom')->nullable();
            $table->string('cognoms');
            $table->string('clinica');
            $table->string('adresa')->nullable();
            $table->integer('codipostal')->nullable();
            $table->string('ciutat')->nullable();
            $table->string('NIF');
            $table->integer('numcolegiat')->unique();
            $table->string('fotodentista')->nullable();
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
