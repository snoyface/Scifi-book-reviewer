@extends('master')

@section('styles')
@stop

@section('content')

You are Editing: <h1> {{ $book->title }}</h1>


<form action='/books/edit/submit' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <input type='hidden' name='id' value='{{$book->id}}'>
       <p>Title<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: $book->title}}" /></p>
       <p>Author<br> <input type="string" name="author"
          value="{{isset($request['author']) ? $request['author']: $book->author}}" /></p>
       <p>Summary<br> <input style="width:150px; height:50px;" type="string" name="summary"
          value="{{isset($request['summary']) ? $request['summary']: $book->summary}}" /></p>
       <p><input type="submit" /></p>
 </form>



@stop
