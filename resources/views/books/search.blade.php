@extends('master')

@section('styles')
@stop

@section('content')

<p>This page will allow you to search for a particular book by Title,
  soon you will also be able to search by rating and author.
</p>

<div class='search'>
  <form action='/books/search' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>What book are you looking for?<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: 'Title?'}}" /></p>
       <p><input type="submit" /></p>
      </form>
</div>

@if(isset($results))
<div id='abook'><p>
    <?php
    echo 'Your search results: <br>';
    echo'<br>';
    
    if(!$results->isEmpty()) {
    // Output the books
    foreach($results as $book) {
    echo '<a href= /books/'.$book['id'] . '>' .$book['title'] . '</a><br>';   
    }}else {
    echo 'No books found for your search I guess. Try again';
    };
    ?>
    
  </p>

@else

@endif
@stop
