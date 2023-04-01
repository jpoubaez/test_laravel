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
            $table->id();
            $table->string('nom');
            $table->string('adresa');
            $table->string('codipostal');
            $table->string('ciutat');
            $table->string('NIF');
            $table->string('numcolegiat');
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
