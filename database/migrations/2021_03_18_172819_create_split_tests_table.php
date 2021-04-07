<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSplitTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('split_tests', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->longText('title');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('deadline');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('split_tests');
    }
}
