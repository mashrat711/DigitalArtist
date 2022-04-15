<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('web_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('youtube_link')->nullable();








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
        Schema::dropIfExists('artists');
    }
}
