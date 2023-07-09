<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncarrecsTaula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('encarrecs', function (Blueprint $table) {
            $table->id()->unique();
            
            $table->foreignId('dentista_id')->references('id')->on('dentistes')->constrained();
            $table->foreignId('pacient_id')->constrained();
            $table->string('descripcio');
            $table->foreignId('albara_id')->nullable()->references('id')->on('albarans')->constrained();
            $table->timestamp('data_entrega');
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
