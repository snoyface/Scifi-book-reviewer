<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Developers Best Friend</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        @yield('styles')
        <img
        src='http://vignette1.wikia.nocookie.net/stargate/images/0/0f/SCI_FI_Logo_HQ.jpg/revision/latest?cb=20091129052252'
        style='width:300px'
        alt='scifi_book_reviewer_logo'>
        
    </head>

    <body>
        @yield('content')
    </body>

    <footer>
        @yield('footer')
    </footer>
</html>
