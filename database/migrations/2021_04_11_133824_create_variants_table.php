<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('variant_name');
            $table->string('variant_id');
            $table->string('old_price');
            $table->string('new_price');
            $table->unsignedBigInteger('split_cycle_id');
            $table->foreign('split_cycle_id')->references('id')->on('split_cycles')->onDelete('cascade');
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
        Schema::dropIfExists('variants');
    }
}
