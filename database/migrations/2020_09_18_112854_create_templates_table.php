<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('label_id');
            $table->longText('imgHeader');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('isActive')->default(1); // 0 => non active, 1 => active
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('label_id')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
