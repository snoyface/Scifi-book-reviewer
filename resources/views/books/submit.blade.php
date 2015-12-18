@extends('master')

@section('styles')
@stop

@section('content')
<div class='submission'>
  <form action='submit' method='POST'>
       <input type='hidden' name='_token' value='{{ csrf_token() }}'>
       <p>Book Title<br> <input type="string" name="title"
          value="{{isset($request['title']) ? $request['title']: 'Title?'}}" /></p>
       <p>Author<br> <input type="string" name="author"
          value="{{isset($request['author']) ? $request['author']: 'Author?'}}" /></p>
       <p>Brief Summary<br> <input style="width:150px; height:50px;" type="string" name="summary"
          value="{{isset($request['summary']) ? $request['summary']: 'Summary?'}}" /></p>
       <p> <select name="rating">
         <option>Rating</option>
         <option value="1">1</option>
         <optionv alue="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>     
         </select></p>
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

<select name="optionType" onchange="this.form.submit();">
    <option>Choose One To Submit This Form</option>
    <option value="Vegetable">Vegetable</option>
    <option value="Fruit">Fruit</option>
  </select>v