<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('post_id');
            $table->string('post_type');
            $table->integer('categorie_user_id')->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('coms');
    }
}
