@extends('master')

@section('styles')
@stop

@section('content')
<div class='submission'>
  <form action='submit' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>Title?<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: 'Title?'}}" /></p>
       <p>Author?<br> <input type="string" name="author"
          value="{{isset($request['author']) ? $request['author']: 'Author?'}}" /></p>
       <p>Summary?<br> <input style="width:150px; height:50px;" type="string" name="summary"
          value="{{isset($request['summary']) ? $request['summary']: 'Summary?'}}" /></p>
       <p><input type="submit" /></p>
      </form>
</div>
@if( isset($request))
              You Submitted:
              <br>
              {{ $request['title'] }}
              <br>
              {{ $request['author'] }}
              <br>
              {{ $request['summary'] }}
              @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

@stop
