<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersHasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_has_products', function (Blueprint $table) {
            $table->char('products_id', 36);
            $table->char('suppliers_id', 36);

            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();
            $table->foreign('suppliers_id')
                ->references('id')
                ->on('suppliers')
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
        Schema::dropIfExists('suppliers_has_products');
    }
}