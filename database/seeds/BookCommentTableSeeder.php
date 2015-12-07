<?php

use Illuminate\Database\Seeder;

class BookCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        # First, create an array of all the books we want to associate comments with
        # The *key* will be the book title, and the *value* will be an array of comments.
        $books =[
            'The Great Gatsby' => ['good', 'great'],
            'A Fire in the Deep' => ['great', 'bad'],
            'Deepness in the Sky' => ['good','great','bad']
        ];

        # Now loop through the above array, creating a new pivot for each book to comment
        foreach($books as $title => $comment) {

        # First get the book
        $book = \App\Book::where('title','like',$title)->first();

        # Now loop through each comment for this book, adding the pivot
          foreach($comment as $commentName) {
            $comment = \App\Comment::where('comment','LIKE',$commentName)->first();

                # Connect this comment to this book
                $book->comments()->save($comment);
            }
        }
    }
}
