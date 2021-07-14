<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArchiveQuestions extends Migration
{

    //


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('archive_question', function (Blueprint $table) {
            $table->integer('id');
            $table->mediumText('title');
            $table->mediumText('image_path_question')->nullable();
            $table->mediumText('content');
            $table->integer('user_id');
            $table->integer('tag');
            $table->integer('category');
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
        Schema::dropIfExists('archive_question');

    }
}
