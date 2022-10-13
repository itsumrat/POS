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
        Schema::create('sell_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_no', 100)->nullable();
            $table->string('transaction_id', 100)->nullable();
            $table->double('total_amount');
            $table->integer('quantity')->default(0)->nullable();
            $table->double('vat');
            $table->double('tax');
            $table->double('exchange_amount')->nullable();
            $table->double('return_amount')->nullable();
            $table->string('payment_type', 100)->nullable();
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
        Schema::dropIfExists('sell_transactions');
    }
};
