@extends('master')

@section('styles')
@stop

@section('content')

<p>This page will allow you to search for a particular book</p>

<div class='search'>
  <form action='books/search' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>What book are you looking for?<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: 'Title?'}}" /></p>
       <p><input type="submit" /></p>
      </form>
</div>

@if(isset($results))
<div id='abook'><p>
    <?php
    echo 'Your searched book results: <br>';
    echo'<br>';
    
    if(!$books->isEmpty()) {
    // Output the books
    foreach($books as $book) {
    echo '<a href= /books/book/'.$book['id'] . '>' .$book['title'] . '</a><br>';   
    }}else {
    echo 'No books found for that title';
    };
    ?>
    
  </p>

@else

<ul id='searchmenu'>
  <li><a href='/search/rating'>view by rating</a></li>
  <li><a href='/search/author'>view by author</a></li>
</ul>
@endif
@stop
