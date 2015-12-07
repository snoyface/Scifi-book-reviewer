<?php

use Illuminate\Database\Seeder;

class UserCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users =[
          '1' => ['good', 'great'],
          '2' => ['great', 'bad', 'bad','great'],
          '3' => ['good','great','bad']
      ];
      foreach($users as $id => $comment) {

      # First get the user
      $book = \App\Book::where('id','like',$id)->first();

      # Now loop through each comment for this user, adding the pivot
        foreach($comment as $commentName) {
          $comment = \App\Comment::where('comment','LIKE',$commentName)->first();

              # Connect this comment to this user
              $user->comments()->save($comment);
          }
      }
    }
}
