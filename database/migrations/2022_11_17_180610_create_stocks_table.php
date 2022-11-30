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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 100)->nullable();
            $table->string('barcode', 100)->nullable();
            $table->integer('item_id')->nullable();
            $table->string('department')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('uom', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('color', 100)->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};
