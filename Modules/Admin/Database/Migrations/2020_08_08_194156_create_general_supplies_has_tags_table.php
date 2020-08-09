<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSuppliesHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_supplies_has_tags', function (Blueprint $table) {
            $table->char('general_supplies_id', 36);
            $table->unsignedBigInteger('tags_id');

            $table->foreign('general_supplies_id')
                ->references('id')->on('general_supplies')
                ->cascadeOnDelete();
            $table->foreign('tags_id')
                ->references('id')->on('product_tags')
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
        Schema::dropIfExists('general_supplies_has_tags');
    }
}