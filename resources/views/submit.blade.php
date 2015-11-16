@extends('master')

@section('styles')
@stop

@section('content')
<div class='submission'>
  <form action="submit" method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>Title?<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: 'Title?'}}" /></p>
       <p>Author?<br> <input type="string" name="author"
          value="{{isset($request['author']) ? $request['title']: 'Author?'}}" /></p>
       <p>Summary?<br> <input type="string" name="summary"
          value="{{isset($request['summary']) ? $request['title']: 'Summary?'}}" /></p>

 <p><input type="submit" /></p>
      </form>
</div>

@stop
