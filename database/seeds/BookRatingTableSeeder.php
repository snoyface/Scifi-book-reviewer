<?php

use Illuminate\Database\Seeder;

class BookRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books =[
        'The Great Gatsby' => [1,4,7],
        'A Fire in the Deep' => [3,5,6,7],
        'Deepness in the Sky' => [4,7,10,10]
        ];

   
         foreach($books as $title => $ratings) {

            $book = \App\Book::where('title','like',$title)->first();
            
            foreach($ratings as $RatingName) {
                $rating = \App\Rating::where('name','LIKE',$ratingName)->first();
                $book->ratings()->save($rating);
          }
         }
    }
}
