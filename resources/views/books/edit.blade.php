@extends('master')

@section('styles')
@stop

@section('content')

<h1>Edit {{ $book->title }}</h1>

{!! Form::open(array('url/books/{id}/edit' => 'foo/bar')) !!}
    {{!! Form::text('title', Input::old('title')) !!}}
    {{!! Form::text('author', Input::old('author')) !!}}
    {{!!Form::text('summary', Input::old('summary')) !!}}
    {{!! Form::submit('Save', ['name' => 'submit']) !!}}
{{!! Form::close() !!}}



@stop
