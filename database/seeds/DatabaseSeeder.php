<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
          $this->call(UsersTableSeeder::class);
          $this->call(BooksTableSeeder::class);
          $this->call(CommentsTableSeeder::class);
          $this->call(BookCommentTableSeeder::class);
          $this->call(BookUserTableSeeder::class);
          $this->call(RatingTableSeeder::class);
          $this->call(BookRatingTableSeeder::class);
          $this->call(UserCommentTableSeeder::class);
        Model::reguard();
    }
}
