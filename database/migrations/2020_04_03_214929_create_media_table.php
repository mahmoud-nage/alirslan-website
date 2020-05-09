<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_title');
            $table->text('source');
            $table->integer('category_id')->unsigned();
            $table->boolean('type')->comment('0 -> video, 1 -> audio');
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
        Schema::dropIfExists('media');
    }
}
