<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use Form;
use App\User;

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

        #create a new book with data submitted
        $book = new \App\Book();
        $book->title = $title;
        $book->author = $auth;
        $book->summary = $sum;

        $book -> save();
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
        dump($book);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
       'title' => 'required|unique:book|alpha_num|max:20',

        ]);
        $book = \App\Book::findOrFail($id);
        $book->update(['title' => $request->title]);
        $book->update(['author' => $request->author]);
        $book->update(['summary' => $request->summary]);


        return view('books/member')
         ->with('book', $book)
         ->with('message', ['Book updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return view('/');
    }

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

    public function ratingSearch()
    {
        $books = \App\Book::with('ratings')->get();

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
    //     $this->validate($request, [
    //    'title' => 'required|unique:book|alpha_num|max:20',

    //     ]);
        // $book = \App\Book::findOrFail($request->id);
        // $book->update(['title' => $request->title]);
        // $book->update(['author' => $request->author]);
        // $book->update(['summary' => $request->summary]);
        
         $book = \App\Book::findOrFail($request->id);
        $book->title = $request->title;
        $book->save();
        return view('books/member')
         #->with('book', $book)
         ->with('message', ['Book updated!']);
    }
}
