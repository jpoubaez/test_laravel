<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlbaransTaula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('albarans', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamp('data_generacio');
            $table->timestamp('data_entrega')->nullable();
            $table->float('total',6,2);
            $table->boolean('entregat');
            $table->foreignId('factura_id')->nullable()->references('id')->on('factures')->constrained();
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
