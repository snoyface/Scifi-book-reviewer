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
        'The Great Gatsby' => ['1'],
        'A Fire in the Deep' => ['5'],
        'Deepness in the Sky' => ['10']
        ];

   
         foreach($books as $title => $rating) {

            $book = \App\Book::where('title','like',$title)->first();
            
            foreach($rating as $ratingName) {
                $rating = \App\Rating::where('rating','LIKE',$ratingName)->first();
                $book->ratings()->save($rating);
          }
         }
    }
}
