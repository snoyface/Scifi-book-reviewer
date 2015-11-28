<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('books')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'summary' => 'this book is a great book, well worth the overview',
    ]);

    DB::table('books')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'title' => 'A Fire in the Deep',
      'author' => 'Larry Niven',
      'summary' => 'this book is a great book, well worth the read. space!',
      ]);

      DB::table('books')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'Deepness in the Sky',
        'author' => 'Larry Niven',
        'summary' => 'Space spiders, how cool is that?',
        ]);
    }
}
