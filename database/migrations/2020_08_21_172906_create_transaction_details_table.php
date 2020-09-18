<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trx_id');
            $table->unsignedBigInteger('product_id');
            $table->string('satuan_dimensi')->nullable(); // cm, m
            $table->string('dimensi')->nullable();
            $table->string('satuan_qty'); // pcs
            $table->integer('qty');
            $table->double('cost_price')->nullable();
            $table->double('selling_price')->nullable();

            $table->foreign('trx_id')->references('id')->on('transactions');
            $table->foreign('product_id')->references('id')->on('products');
        });

        // php artisan migrate --path=/database/migrations/2020_08_21_172906_create_transaction_details_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
