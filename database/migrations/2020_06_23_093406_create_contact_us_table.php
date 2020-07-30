<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('whatsapp_url')->default(null);
            $table->text('tlp');
            $table->text('email1');
            $table->text('email2');
            $table->text('alamat1');
            $table->text('alamat2');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('instagram');
            $table->text('tag_about');
            $table->text('tag_service');
            $table->text('tag_client');
            $table->text('tag_career');
            $table->longText('based_64_about_us1');
            $table->longText('based_64_about_us2');
            $table->longText('based_64_about_us3');
            $table->longText('based_64_about_us4');
            $table->longText('based_64_contact_us');
            $table->longText('based_64_service');
            $table->longText('based_64_client');
            $table->longText('based_64_career');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('contact_us');
    }
}
