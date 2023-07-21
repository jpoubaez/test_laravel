<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaterialsEncarrecsTaula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('materials_encarrecs', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('materials_id')->constrained();
            $table->foreignId('encarrecs_id')->constrained()->cascadeOnDelete();
            $table->float('quantitat_material',6,2);
            $table->float('sub_total',6,2);
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
