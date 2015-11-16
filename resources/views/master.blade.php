<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Developers Best Friend</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        @yield('styles')
        <link rel="stylesheet" href="/css/styles.css">

    </head>

    <body>
      <img id="logo"
      src='images/SCI_FI_Logo_HQ.jpg'
      style='width:300px'
      alt='scifi_book_reviewer_logo'>
        @yield('content')
    </body>

    <footer>
        @yield('footer')
        <a href={{ URL::previous() }}>Reload</a>
        <br>
        <a href='/'>Back to Homepage</a>
    </footer>
</html>
