<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_no', 100)->nullable();
            $table->string('unique_id', 100)->nullable();
            $table->string('barcode', 100)->nullable();
            $table->integer('item_id')->nullable();
            $table->string('item_name', 255)->nullable();
            $table->string('uom', 100)->nullable();
            $table->integer('quantity')->nullable();
            $table->double('old_unit_price')->nullable();
            $table->double('new_unit_price')->nullable();
            $table->double('subtotal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
};
