<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJafProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaf_products_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('jaf_id', 36);
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('jaf_id')
                ->references('id')
                ->on('jaf_products')
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
        Schema::dropIfExists('jaf_products_details');
    }
}