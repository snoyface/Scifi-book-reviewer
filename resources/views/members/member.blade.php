@extends('master')

@section('styles')
@stop

@section('content')
 <div class='container'>

    <div class='contents'>
    <div class='title'>Scifi Book club Reviewer</div>
  <div id='allbooks'><p>
    <?php
    if(!$books->isEmpty()) {
    // Output the books
    foreach($books as $book) {
    echo $book->title.'<br>';
    }
    }
    else {
    echo 'No books found yet';
    }
    ?>;;;;9m
    
  </p>
  </div>
	</div>
</div>


@stop
