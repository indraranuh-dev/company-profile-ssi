<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersHasProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_has_product_types', function (Blueprint $table) {
            $table->char('suppliers_id', 36);
            $table->unsignedBigInteger('types_id');

            $table->foreign('suppliers_id')
                ->references('id')
                ->on('suppliers')
                ->cascadeOnDelete();
            $table->foreign('types_id')
                ->references('id')
                ->on('product_types')
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
        Schema::dropIfExists('');
    }
}