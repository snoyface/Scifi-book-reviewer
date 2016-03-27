@extends('master')

@section('styles')
@stop

@section('content')

@if( isset($book))
<h1>Title</h1>{{ $book->title }}
<br>
<h1>Author</h1>{{ $book->author }}
<br>
<h1>Summary</h1>{{ $book->summary }}
<br>
@else No book chosen
@endif
<h2>Comments</h2>
 <?php
 //displays the rating of the book
 $rateBook = [];


//add comments
//Future Feature - display name of user

foreach($book->comment as $comment){
    echo $comment->user.' said ';
    foreach ($comment->comment as $comment){
        echo $comment.'<br><br>';
//
//    foreach ($book->comments as $comment){
//        echo $comment->comment.'<br><br>';
}};

//    foreach($book->comments as $comment) {
//
//        foreach($comment->user as $user){
//            echo $user->name.' said ';
//            echo $comment->comment.'<br><br>';
//    }
// };
?>
<h2>Ratings</h2>
<?php
foreach($book->ratings as $rating){
         echo 'This book has a rating of '.$rating->rating.'<br>';
         $rateBook[] = $rating ->rating;
       };


//Future Feature - average rating
// if ($rateBook != null){

//     $average_rating = array_sum($rateBook) / count($rateBook);
//     echo 'The average rating for '.$book->title.' is '.$average_rating;
// }else {$rateBook = null;};

 ?>
 <form action='/books/{{$book->id}}' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>Comment?<br> <input type="string" name="comment"
          value="{{isset($request['comment']) ? $request['comment']: 'comment?'}}" /></p>   
       <p><input type="submit" /></p>
 </form>
 
 <td>  <a href="/books/{{ $book->id }}/edit">
                            <button type="button" class="btn btn-default">Edit </button> </a> </td>
<td>  <a href="/books/{{ $book->id }}/confirm_delete">
                            <button type="button" class="btn btn-default">Delete </button> </a> </td>
 
 
@stop


