<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSuppliesHasImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_supplies_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('general_supplies_id', 36);
            $table->string('image');
            $table->timestamps();

            $table->foreign('general_supplies_id')
                ->references('id')->on('general_supplies')
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
        Schema::dropIfExists('general_supplies_has_images');
    }
}