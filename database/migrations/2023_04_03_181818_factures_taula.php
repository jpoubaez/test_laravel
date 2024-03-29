<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacturesTaula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('factures', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('tipus');
            $table->timestamp('data_generacio');
            $table->timestamp('data_cobrament')->nullable();
            $table->float('total_a_cobrar',7,2);
            $table->boolean('cobrada');
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
