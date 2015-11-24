<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class createController extends Controller{
      
      public function creator (Request $request){
            $book = new \App\Book();
            $book->create(Request);
            return view('/thanks');
      }
}
    //
