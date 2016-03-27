<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use Input;
use Form;
use App\User;
use Auth;

class BookController extends Controller
{

    public function index()
    {
      $books = DB::table('books')->get();

// Output the results
      foreach ($books as $book) {
      echo $book->title;
      };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

         $title = $request -> input('title');
         $auth = $request -> input('author');
         $sum = $request -> input('summary');
         $rate = $request -> input('rating');
        #create a new book with data submitted
        $book = new \App\Book();
        $book->title = $title;
        $book->author = $auth;
        $book->summary = $sum;
        $book -> save();
        
        #attach rating to book table
        $ratingBook = new \App\Rating();
        $ratingBook ->rating = $rate;
        $ratingBook ->save();
        $book->ratings()->attach($ratingBook);

        
        Session::flash('message', 'Successfully created book!');
        $books = \App\Book::all();
        return view('/books/member')
        ->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $book = \App\Book::where('id',$id)->first();
        return view('books/book')
         ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = \App\Book::findOrFail($id);

        return view('books.edit')
            -> with('book', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $this->validate($request, [
       'title' => 'required|alpha_num|max:20',
        ]);

        $searchterm = $request->title;

        $results = \App\Book::where('title', 'LIKE', '%'. $searchterm .'%')
             ->get();

       if (count($results) > 0){

            $count = count($results);

           
           return view('/books/search', compact('results', 'count'));

        }

       return view('/books/search')->with('message', ['Sorry, no results!']);

    }

//Future feature, search by rating
    public function ratingSearch($rate)
    {
        $books = \App\Book::with('ratings', 'LIKE', $rate )->get();

         foreach($books as $book) {
            echo '<br>'.$book->title.' has a rating of';
            $mean = 0;
            $i = 0;
            $rate = 0;
                foreach($book->rating as $rating) {
                    $mean = $mean + $rating;
                    $i++;
                }

            $rate = $mean / $i;
            echo ' has a rating of ' + $rate;
         }
    }
    public function edited(Request $request){
        
         $book = \App\Book::findOrFail($request->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->summary = $request->summary;
        $book->save();
        $books = \App\Book::all();
        return view('books/member')
         ->with('books', $books);
    }
    
    public function comment(Request $request, $id)
    {
        $book = \App\Book::findOrFail($id);
//      $user = \App\User::($id);
        $commented = $request -> input('comment');
        $user = Auth::user();
        $comment = new \App\Comment();
        $comment -> comment = $commented;
        $comment ->save();
        $book->comments()->attach($comment);
        $user->comments()->attach($comment);
        return Redirect::back();
    }
    
    public function rating(Request $request, $id)
    {
        $rating = \App\Book::findOrFail($id);
        
        
        return Redirect::back();
    }
    
    public function getConfirmDelete($id) {

    $book = \App\Book::find($id);

    return view('books/delete')->with('book', $book);
    }

    public function delete($id) {
        
        $book = \App\Book::find($id);

        if(is_null($book)) {
        Session::flash('flash_message','Book not found.');
        return redirect('/');
        }
        
        if($book->comments()) {
            $book->comments()->detach();
         }   
          if($book->users()) {
             $book->users()->detach();
          }
          if($book->ratings()) {
             $book->ratings()->detach();
          }

        $book->delete();
        Session::flash('flash_message',$book->title.' was deleted.');
    return redirect('/');

    }
}
