<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta');
            $table->string('rutaAvi');
            $table->string('rutaMpeg');
            $table->string('rutaMkv');
            $table->string('ruta_thumbnail');
            $table->string('titulo');
            $table->text('descripcion');
            $table->integer('duracion');
            $table->integer('reproducciones')->nullable()->change();
            $table->integer('tipo')->nullable()->change();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('videos');
    }
}
