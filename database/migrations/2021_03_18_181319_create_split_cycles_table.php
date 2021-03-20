<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSplitCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('split_cycles', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->date('cycle_date');
            $table->string('variant_id');
            $table->string('price');
            $table->unsignedBigInteger('split_test_id');
            $table->foreign('split_test_id')->references('id')->on('split_tests');
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
        Schema::dropIfExists('split_cycles');
    }
}
