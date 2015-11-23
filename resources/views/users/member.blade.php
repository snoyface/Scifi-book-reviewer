@extends('/master')

@section('styles')
@stop

@section('content')
<h1>You are now logged in.</h1>

<div class='title'>Scifi Book club Reviewer</div>
	<ul id='mem_menu'>
		<li><a href='/submit'>Submit a Book</a>  </li>
		<li><a href='/search'>Search Books</a>  </li>
		<li><a href='/myreviews'>Your Books Reviews</a>  </li>
	</ul>  
</div>

@stop
