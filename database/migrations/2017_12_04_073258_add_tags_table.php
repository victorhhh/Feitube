<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('tag_video', function (Blueprint $table){
           $table->increments('id');

           $table->integer('video_id')->unsigned();
           $table->integer('tag_id')->unsigned();

           $table->foreign('video_id')->references('id')->on('videos');
           $table->foreign('tag_id')->references('id')->on('tags');

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
        Schema::dropIfExists('tags');
    }
}
