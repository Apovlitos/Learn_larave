<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagArt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('tags_id');
            $table->unsignedBigInteger('articles_id');
            $table->primary(['tags_id', 'articles_id']);
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
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
