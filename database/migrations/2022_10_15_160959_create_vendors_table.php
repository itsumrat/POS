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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_contact', 15)->nullable();
            $table->string('unique_id', 100)->nullable();
            $table->string('vendor_name', 255)->nullable();
            $table->string('nid_no',20)->nullable();
            $table->string('address', 255)->nullable();
            $table->double('openning_balance')->nullable();
            $table->integer('vendor_type')->nullable();
            $table->tinyInteger('status')->default('1')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
