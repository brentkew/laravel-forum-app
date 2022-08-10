<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');

            $table->integer('question_id')->unsigned();
            $table->integer('user_id');

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade'); 

            // $table->unsignedBigInteger('question_id')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable();

            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('replies');
    }
}
