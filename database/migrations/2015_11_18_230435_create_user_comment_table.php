<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_comment', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();

        # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
        $table->integer('user_id')->unsigned();
        $table->integer('comment_id')->unsigned();

        # Make foreign keys
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('comment_id')->references('id')->on('comments');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('user_comment');
    }
}
