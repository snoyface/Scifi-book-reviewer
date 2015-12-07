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
@foreach($book->comments as $comment) {
    echo $comment->comment.' ';
}
@else No book chosen
@endif


@stop
