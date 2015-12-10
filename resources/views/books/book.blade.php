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
foreach($book->comments as $comment) {
        $users = $comment->users; 
        dump($users);
       // echo $user->name.'commented :';
   
    echo $comment->comment.'<br> ';
};
?>
 <form action='book/{id}' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>Comment?<br> <input type="string" name="comment"
          value="{{isset($request['comment']) ? $request['comment']: 'comment?'}}" /></p>
       <p><input type="submit" /></p>
 </form>
 
 <td>  <a href="/books/{{ $book->id }}/edit">
                            <button type="button" class="btn btn-default">Edit </button> </a> </td>
                    <td>  <a href="/books/{{ $book->id }}/delete">
                            <button type="button" class="btn btn-default">delete </button> </a> </td>
 
 
@stop
