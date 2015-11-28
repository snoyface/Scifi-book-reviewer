@extends('master')

@section('styles')
@stop

@section('content')

<p>This page will allow you to search for a particular book</p>
<ul id='searchmenu'>
  <li><a href='/search/rating'>view by rating</a></li>
  <li><a href='/search/author'>view by author</a></li>
</ul>

@stop
