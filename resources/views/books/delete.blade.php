

@section('styles')

@stop

@section('content')

    <div id='delete'>
     Delete Book!
     <p>Are you sure you want to delete <em>{{$book->title}}</em>?</p>
      <p><a href='/books/{{$book->id}}/delete'>Yes...</a></p>
  </div>
