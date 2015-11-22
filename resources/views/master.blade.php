<!DOCTYPE html>
<html>
    <head>
      @yield('header')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Developers Best Friend</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        @yield('styles')
        <link rel="stylesheet" href="/css/styles.css">

    </head>

    <body>
      <div id="wrapper">
        <img id="logo"
        src='/images/SCI_FI_Logo_HQ.jpg'
        style='width:300px'
        alt='scifi_book_reviewer_logo'>
        <nav>
          <ul>
            @if(Auth::check())
              <li><a href='/'>Home</a></li>
              <li><a href='/submit'>Add a book</a></li>
              <li><a href='/search'>Search books</a></li>
              <li><a href='/auth/logout'>Log out</a></li>
            @else
              <li><a href='/'>Home</a></li>
              <li><a href='/auth/login'>Log in</a></li>
              <li><a href='/auth/register'>Register</a></li>
        @endif
        </ul>
      </nav>

        @yield('content')

      <footer>
        @yield('footer')
        <a href={{ URL::previous() }}>Reload</a>
        <br>
        <a href='/'>Back to Homepage</a>
      </footer>
    </div>
  </body>
</html>
