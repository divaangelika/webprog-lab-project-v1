<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('genre_id');
            $table->primary(['movie_id', 'genre_id']);
            $table->foreignId('movie_id')->references('id')->on('movies')->onDelete('cascade');
            // $table->unsignedBigInteger('movie_id');
            // $table->unsignedBigInteger('genre_id');
            // $table->primary(['movie_id', 'genre_id']);
            $table->foreignId('movie_id')->reference('id')->on('movies')->onDelete('cascade');
            $table->foreignId('genre_id')->references('id')->on('genres')->onDelete('cascade');
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
        Schema::dropIfExists('movie_genre');
    }
}
