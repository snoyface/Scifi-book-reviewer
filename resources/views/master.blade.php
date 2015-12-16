<!DOCTYPE html>
<html>
    <head>
      @yield('header')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scifi Book Reviewer</title>
        <!--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        @yield('styles')
        <link rel="stylesheet" href="/css/styles.css">
        
    </head>

    <body>
      <div id="wrapper">
        <div id='transbox'>
        <img id="logo"
        src='/images/SCI_FI_Logo_HQ.jpg'
        style='width:300px'
        alt='scifi_book_reviewer_logo'>
        <div id="rotator">
        <nav>
          <ul>
            @if(Auth::check())
              <li><a href='/'>Home</a></li>
              <li><a href='/books/submit'>Add a book</a></li>
              <li><a href='/books/search'>Search books</a></li>
              <li><a href='/auth/logout'>Log out</a></li>
            @else
              <li><a href='/'>Home</a></li>
              <li><a href='/auth/login'>Log in</a></li>
              <li><a href='/auth/register'>Register</a></li>
              
        @endif
        </ul>
      </nav>

        @yield('content')
        
        @if(Session::get('flash_message') != null))
        <div class='flash_message'>{{ Session::get('flash_message') }}</div>
        @endif
        
      <footer>
        @yield('footer')
        <a href={{ URL::previous() }}>Reload</a>
        <br>
      </footer>
      </div>
    </div>
  </body>
</html>
