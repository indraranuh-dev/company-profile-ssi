<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsHasSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_has_subcategories', function (Blueprint $table) {
            $table->char('products_id', 36);
            $table->unsignedBigInteger('subcategories_id');

            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();
            $table->foreign('subcategories_id')
                ->references('id')
                ->on('products_subcategories')
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
        Schema::dropIfExists('products_has_subcategories');
    }
}