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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_no', 100)->nullable();
            $table->timestamp('requisition_date')->nullable();
            $table->string('unique_id', 100)->nullable();
            $table->integer('vendor_id')->nullable();
            $table->double('total')->nullable();
            $table->double('vat')->nullable();
            $table->double('other_charge')->nullable();
            $table->double('discount')->nullable();
            $table->double('grand_total')->nullable();
            $table->string('status',100)->default('pending')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('requisitions');
    }
};
