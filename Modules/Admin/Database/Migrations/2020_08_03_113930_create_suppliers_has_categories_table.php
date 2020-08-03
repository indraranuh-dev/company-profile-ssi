<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersHasCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_has_categories', function (Blueprint $table) {
            $table->char('suppliers_id', 36);
            $table->unsignedBigInteger('categories_id');

            $table->foreign('suppliers_id')->references('id')->on('suppliers')->cascadeOnDelete();
            $table->foreign('categories_id')->references('id')->on('products_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers_has_categories');
    }
}