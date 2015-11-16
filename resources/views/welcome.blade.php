@extends('master')

@section('styles')
@stop

@section('content')
  <div class='container'>

    <div class='contents'>
      <div class='title'>Scifi Book club Reviewer</div>
        <div class='intro'>
          <h1>Welcome to the Scifi Book Club database!</h1><br>
          <p>This app provides you with the ability to submit new book reviews, search other book reviews, and add your own comments
              to other reviews.</p><br>
          <p>To submit a book, click the spaceship</p>
          <a href='/create'>
            <img id="rocket" src='/images/simple-rocket-hi.png'
            alt='scifi_book_reviewer_logo'>
          </a>
        </div>
        
    </div>
  </div>
@stop
