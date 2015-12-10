<?php

use Illuminate\Database\Seeder;

class CommentUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users =[
          'Jill' => ['good', 'great'],
          'Jamal' => ['great', 'bad', 'bad','great'],
          'Jon macleod' => ['good','great','bad']
      ];
      foreach($users as $name => $comment) {

      # First get the user
      $user = \App\User::where('name','like',$name)->first();

      # Now loop through each comment for this user, adding the pivot
        foreach($comment as $commentName) {
          $comment = \App\Comment::where('comment','LIKE',$commentName)->first();

              # Connect this comment to this user
              $user->comments()->save($comment);
          }
      }
    }
}
