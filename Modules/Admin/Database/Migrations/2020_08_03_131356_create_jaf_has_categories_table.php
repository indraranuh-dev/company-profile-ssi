<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJafHasCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaf_has_categories', function (Blueprint $table) {
            $table->char('jaf_id', 36);
            $table->unsignedBigInteger('jaf_categories');
            $table->foreign('jaf_id')->references('id')->on('jaf_products')->cascadeOnDelete();
            $table->foreign('jaf_categories')->references('id')->on('jaf_product_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jaf_has_categories');
    }
}