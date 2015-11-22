@extends('master')

@section('styles')
<style>
footer{
  display: none;
}
</style>
@stop

@section('content')
  <div class='container'>

    <div class='contents'>
      <div class='title'>Scifi Book club Reviewer</div>
        <div class='intro'>
          <h1>Welcome to the Scifi Book Club database!</h1><br>
          <p>This app provides you with the ability to submit new book reviews, search other book reviews, and add your own comments
              to other reviews.</p>
        </div>
        <div id="create_spaceship">
          <p>To Register, click this spaceship</p>
            <a href='/auth/login'>
              <img id="rocket" src='/images/simple-rocket-hi.png'
                alt='register'>
            </a>
        </div>
        <div id='login_raygun'>
          <p>To login, click the ray gun</p>
          <a href='/auth/login'>
            <img id='raygun' src='/images/raygun.jpg'
              alt='login'>
        </div>
    </div>
  </div>
@stop
