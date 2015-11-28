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
        

    # First, create an array of all the books we want to associate tags with
    # The *key* will be the book title, and the *value* will be an array of tags.
    $books =[
        'The Great Gatsby' => ['good', 'great'],
        'A Fire in the Deep' => ['great', 'bad'],
        'Deepness in the Sky' => ['good','great','bad']
    ];

    # Now loop through the above array, creating a new pivot for each book to tag
    foreach($books as $title => $tags) {

        # First get the book
        $book = \App\Book::where('title','like',$title)->first();

        # Now loop through each tag for this book, adding the pivot
        foreach($tags as $tagName) {
            $tag = \App\Tag::where('name','LIKE',$tagName)->first();

            # Connect this tag to this book
            $book->tags()->save($tag);
        }

    }
}
    }
}
