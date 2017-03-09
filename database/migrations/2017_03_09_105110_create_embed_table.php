<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Embed Table
        Schema::create('youtube_embeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('youtubeEmbedCode');
            $table->string('youtubeEmbedCodeBy');
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
        //
    }
}
