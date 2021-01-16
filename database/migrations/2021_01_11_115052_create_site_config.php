<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_config', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->tinyInteger('maintenance')->default(0);
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
        Schema::dropIfExists('site_config');
    }
}
