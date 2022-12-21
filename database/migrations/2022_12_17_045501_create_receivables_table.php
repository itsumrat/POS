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
        Schema::create('receivables', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 255)->nullable();
            $table->string('ref_no', 255)->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->double('current_balance')->nullable();
            $table->double('receive_amount')->nullable();
            $table->string('payment_type', 50)->nullable();
            $table->string('cheque_no', 50)->nullable();
            $table->integer('account_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
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
        Schema::dropIfExists('receivables');
    }
};
