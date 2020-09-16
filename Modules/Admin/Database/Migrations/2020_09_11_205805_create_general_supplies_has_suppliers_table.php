<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSuppliesHasSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_supplies_has_suppliers', function (Blueprint $table) {
            $table->uuid('general_supplies_id');
            $table->uuid('supplier_id');

            $table->foreign('general_supplies_id')
                ->references('id')
                ->on('general_supplies')->cascadeOnDelete();
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_supplies_has_suppliers');
    }
}