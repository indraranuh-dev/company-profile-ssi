<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJafHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaf_has_tags', function (Blueprint $table) {
            $table->char('jafs_id', 36);
            $table->unsignedBigInteger('tags_id');

            $table->foreign('jafs_id')
                ->references('id')->on('jaf_products')
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
        Schema::dropIfExists('jaf_has_tags');
    }
}