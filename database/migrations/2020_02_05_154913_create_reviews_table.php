<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('review')->nullable();
            $table->integer('stars')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->default('1');
            $table->unsignedBigInteger('movie_id')->default('1');

            //SI BORRES UNA PELI ES BORREN ELS SEUS COMENTARIS I SI BORRES UN USUARI TAMBÉ
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
