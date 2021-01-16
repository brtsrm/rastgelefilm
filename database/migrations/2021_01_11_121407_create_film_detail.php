<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("film_id");
            $table->string("img");
            $table->string("description");
            $table->string("imdb_puan");
            $table->string("original_name");
            $table->string("year");
            $table->integer("like_total");
            $table->integer("dislike_total");
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
        Schema::dropIfExists('film_detail');
    }
}
