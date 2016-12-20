<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    Schema::create('posts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('slug')->unique();
        $table->integer('user_id')->unsigned();
//        $table->integer('category_id')->unsigned();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
        $table->timestamp('published_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->index();
//
//        $table->foreign('user_id')->references('id')->on('users');
//        $table->foreign('category_id')->references('id')->on('categories');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
