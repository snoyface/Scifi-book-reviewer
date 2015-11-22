<?php

namespace App\Http\Controllers\createController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


class createController extends Controller{
      public function creator(Request $request){
            $book->create($$_REQUEST);
            return view('/thanks');
      }
}
    //
