<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 100)->nullable();
            $table->string('name')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('contact_no', 30)->nullable();
            $table->string('trade_license_no', 50)->nullable();
            $table->string('tin_no', 30)->nullable();
            $table->longText('image')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('companies');
    }
};