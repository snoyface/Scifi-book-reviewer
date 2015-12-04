<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

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
        return view('books/member');
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
    public function show($id)
    {
        $books = Widget::findOrFail($id);

        return view('$books.show', compact('$books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

           //php artisan config:cache return view('/search', compact('results', 'count'));
       
        }

       return view('/search')->with('message', ['Sorry, no results!']);

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
}
