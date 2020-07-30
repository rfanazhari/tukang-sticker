<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_carrer_id');
            // $table->string('name');
            $table->string('location');
            $table->text('description');
            $table->string('url');
            $table->tinyInteger('isActive')->default(1); // 0 => non active, 1 => active
            $table->date('expired');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cat_carrer_id')->references('id')->on('cat_carrers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrers');
    }
}
