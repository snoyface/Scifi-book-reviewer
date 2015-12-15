@extends('/master')

@section('styles')
@stop

@section('content')
foreach($books as $book) {
        echo '<br>'.$book->title.' is tagged with: ';
        foreach($book->tags as $tag) {
        echo $tag->name.' ';

@stop
