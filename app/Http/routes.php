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
    return view('welcome');
});

/*
Route::get('/members/member', function (){
    return view('/members/member');
});
*/
//debugging help
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

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

Route::get('/submit', function(){

  return view('/members/submit');
});

Route::get('/members/member', function(){
      $books = \App\Book::all();
      return view('members/member')
      ->with('books', $books);
});

Route::post('/members/submit', 'BookController@create');

//Route::controller('submit', 'bookController');
//Route::post('/submit', 'BookController@create');
//Route::get('/submit', 'BookController@create');
//Route::controller('members/submit', 'BookController@create' );

//Route::resource('submit', 'BookController');
//Route::controller('/members/submit/create', 'Bookcontroller@create' );
//Route::post('members/submit/create', 'BookController@create');
/*
 just for reference
Route::get('/users', function () {
	return view('users');
});

//lorem controller and routing
Route::controller('lorem','loremController');
Route::post('/lorem', 'loremController@generator');

*/

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
Route:get('/search', function() {
    return view('members/search');
});

Route::post('/members/search', 'SearchController@create');
