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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('register_no', 255);
            $table->string('transaction_id', 255);
            $table->integer('product_id');
            $table->string('barcode', 255);
            $table->string('product_title', 255);
            $table->string('quantity', 255);
            $table->string('vat', 255);
            $table->string('tax', 255);
            $table->string('price', 255);
            $table->string('total_amount', 255);
            $table->string('color', 255);
            $table->string('size', 255);
            $table->string('unit', 255);
            $table->integer('created_by');
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
        Schema::dropIfExists('sales');
    }
};
