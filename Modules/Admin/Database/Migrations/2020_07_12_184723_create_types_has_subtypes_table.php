<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesHasSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_has_subtypes', function (Blueprint $table) {
            $table->unsignedBigInteger('types_id');
            $table->unsignedBigInteger('subtypes_id');

            $table->foreign('types_id')
                ->references('id')->on('product_types')
                ->cascadeOnDelete();

            $table->foreign('subtypes_id')
                ->references('id')->on('product_subtypes')
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
        Schema::dropIfExists('types_has__subtypes');
    }
}