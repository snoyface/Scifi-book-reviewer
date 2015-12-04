@extends('master')

@section('styles')
@stop

@section('content')
<?php
       
       echo 'title: ' .$books->title.'<br>';
       // echo 'title: ' .$books['title'];
/*        echo '<br>';
        echo 'author: '.$books['author'];
        echo '<br>';
        echo 'summary: '.$books['summary'];
        echo '<br>';
        echo 'eventually, put rating here';
*/
?>
@stop
