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
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->year('release_year');
            $table->string('homepage');
            $table->unsignedBigInteger('budget');
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
        Schema::dropIfExists('movies');
    }
}


//         Schema::create('movie_user', function (Blueprint $table) {
    // $table->id();
    // $table->foreignId('user_id')->constrained()->onDelete('cascade');
    // $table->foreignId('movie_id')->constrained()->onDelete('cascade');
    // $table->integer('rating');
    // $table->text('body');
    // $table->timestamps();