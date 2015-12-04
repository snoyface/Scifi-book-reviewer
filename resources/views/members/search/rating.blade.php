@extends('master')

@section('styles')
@stop

@section('content')

<p>This page shows you all the books, best average rating first:</p>
<?php
 if(!$books->isEmpty()){
    // Output the books
    foreach($books as $book) {
            echo '<a href='.$book['id'] . '>' .$book['title'] . '</a>';
     /*       //echo ' rating is: '.$book['rating'].'<br><br>';
            $mean = 0;
            $add = 0;
            $rate = 0;
                foreach($book->$ratings as $rating) {
                	$mean = $mean + $rating;
                    $add++;
               }        
            $rate = $mean / $add;
           echo ' has a rating of ' + $rate;
           */ 
           echo 'foo';
     }
 } else {
         echo 'No books found yet';
        }
?>
@stop