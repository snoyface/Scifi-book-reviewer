<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//starting page
Route::get('/', function () {
    $user = Auth::user();
    if($user) {
        $books = \App\Book::all();
        return view('/books/member')
        ->with('books', $books);
    } else {
        return view('welcome');
    };
});

//view logs
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//debugging help
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


Route::get('books/submit', function(){
  return view('/books/submit');
});

Route::get('/books/member', function(){
      $books = \App\Book::all();
      session(['books'=>$books]);
      return view('/books/members');
});

Route::post('/books/submit', 'BookController@create');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

//Route to Confirm Login worked!
Route::get('/confirm-login-worked', function() {

    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

//setup search

Route:get('/books/search', function() {
    $books = \App\Book::all();
    return view('books/search')
    ->with('books', $books);
});

Route::get('/search/rating', function() {
    $books = \App\Book::all();
    $ratings = \App\Rating::all();
    return view('books/search/rating')
          ->with('books', $books)
          ->with('ratings', $ratings);
});

Route::resource('books', 'BookController');
Route::resource('book', 'BookController');
Route::post('/books/search', 'BookController@search');
Route::post('/books/edit/submit', 'BookController@edited');
Route::post('/books/{id}', 'BookController@comment');
Route::get('/books/{id}/delete', 'BookController@delete');
Route::get('/books/{id?}/confirm_delete/', 'BookController@getConfirmDelete');