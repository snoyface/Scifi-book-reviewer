@extends('master')

@section('styles')
@stop

@section('content')

       
<h2>{{ $book->title }}</h2>
      

@stop
echo '<br>';
        echo 'author: '.$books['author'];
        echo '<br>';
        echo 'summary: '.$books['summary'];
        echo '<br>';
        echo 'eventually, put rating here';
