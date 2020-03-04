<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('year',8)->nullable();
            $table->string('director',64)->nullable();
            $table->string('poster')->nullable();
            $table->string('trailer')->nullable();
            $table->boolean('rented')->default(false);
            $table->text('synopsis')->nullable();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->timestamps();

             $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
