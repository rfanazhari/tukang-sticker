<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trx_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('payment_type')->default("cash"); // cash, transfer,
            $table->string('status')->default('inquery'); // inquery, invoice, completed, sending
            $table->string('status_reservation')->default('pickup'); // pickup, delivery
            $table->text('delivery_address')->nullable();
            $table->double('total_cost_price');
            $table->double('total_selling_price');
            $table->double('delivery_order')->default(0);
            $table->string('status_payment')->default('unpaid'); // unpaid, paid
            $table->dateTime('date_payment')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });

        // php artisan migrate --path=/database/migrations/2020_08_21_165230_create_transactions_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
        Schema::dropIfExists('transactions');
    }
}
