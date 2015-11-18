<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('book_user', function (Blueprint $table) {

          $table->increments('id');
          $table->timestamps();

          # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
          #  Note how the field names here correspond to the tables they will connect...
          # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
          $table->integer('book_id')->unsigned();
          $table->integer('user_id')->unsigned();

          # Make foreign keys
          $table->foreign('book_id')->references('id')->on('books');
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('book_user');
    }
}
