<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rating', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        # `book_id` and `rating_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `book_id` will reference the `books table` and `rating_id` will reference the `tags` table.
        $table->integer('book_id')->unsigned();
        $table->integer('rating_id')->unsigned();

        # Make foreign keys
        $table->foreign('book_id')->references('id')->on('books');
        $table->foreign('rating_id')->references('id')->on('ratings');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_rating');
    }
}
