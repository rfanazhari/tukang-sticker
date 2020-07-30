<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurServiceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_service_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('our_service_id');
            $table->string('alt');
            $table->longText('based_64');
            $table->tinyInteger('isActive')->default(1); // 0 => non active, 1 => active
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
        Schema::dropIfExists('our_service_images');
    }
}
