<?php

use Illuminate\Database\Seeder;

class BookUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $books =[
          "The Great Gatsby" => ['Jill','Jamal'],
          "A Fire in the Deep" => ['jon macleod','Jill'],
          "Deepness in the Sky" => ['Jamal','Jill', 'jon macleod']
      ];
      foreach($books as $title => $user) {

      # First get the book
      $book = \App\Book::where('title','like',$title)->first();

      # Now loop through each comment for this user, adding the pivot
        foreach($user as $userName) {
          $user = \App\User::where('name','LIKE',$userName)->first();

              # Connect this comment to this book
              $book->users()->save($user);
          }
      }
    }
}
