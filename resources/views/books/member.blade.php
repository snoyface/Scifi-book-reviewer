 @extends('master')

@section('styles')
@stop

@section('content')
  <div class='container'>
    <div class='contents'>
    <div class='title'>Scifi Book club Reviewer</div>
  <div id='allbooks'><p>
    
    <?php
    echo 'Current books in database 
';
    echo'
';    
    if(!$books->isEmpty()) {
    // Output the books
    foreach($books as $book) {
    echo '<a href= /books/'.$book['id'] . '>' .$book['title'] . '</a>
';   
    }}else {
    echo 'No books found yet';
    };   
    ?>
    
  </p>
  </div>
	</div>
</div>

@stop