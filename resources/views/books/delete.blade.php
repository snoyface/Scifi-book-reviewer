@extends('master')

@section('styles')
 <link rel="stylesheet" href="/css/styles.css">

@stop

@section('content')
  <div id='delete'>
    <h1>Delete Book!</h1>
    <p>Are you sure you want to delete <em>{{$book->title}}</em>?</p>
    <p><a href='/books/{{$book->id}}/delete'>Yes...</a></p>
  </div>