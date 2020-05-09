<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title');
            $table->text('ar_details');
            $table->string('image');
            $table->integer('category_id')->unsigned();
            $table->boolean('type')->comment('0 -> news, 1 -> article');
            $table->string('permalink')->comment('its for seo');
            $table->string('keywords')->comment('its for seo');
            $table->text('description')->comment('its for seo');
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
        Schema::dropIfExists('news');
    }
}
