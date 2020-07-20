<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_has_tags', function (Blueprint $table) {
            $table->char('products_id', 36);
            $table->unsignedBigInteger('tags_id');

            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();
            $table->foreign('tags_id')
                ->references('id')
                ->on('product_tags')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_has_tags');
    }
}