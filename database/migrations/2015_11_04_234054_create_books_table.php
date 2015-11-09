<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('books', function (Blueprint $table){
          $table->increments('id');
          $table->timestamp();
          $table->varchar('author');
          $table->varchar('summary');
        });

        schema::create('ratings', function (Blueprint $table){
          $table->increments('id');
          $table->timestamp();
          $table->int('rating');
          $table->varchar('review');
        });

        schema::create('comments', function (Blueprint $table){
          $table->increments('id');
          $table->timestamp();
          $table->varchar('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
        Schema::drop('ratings');
        Schema::drop('comments');
    }
}
