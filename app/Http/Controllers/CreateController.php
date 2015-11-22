<?php

namespace App\Http\Controllers\createController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
//require_once '/path/to/Faker/src/autoload.php';

class createController extends Controller{
      //creates new book for entry into books table
      public function creator(Request $request) {
        $title = $request -> input('title');
        $auth = $request -> input('author');
        $sum = $request -> input('summary');

        DB::table('books')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'title' => '$title',
          'author' => '$auth',
          'summary' => '$sum',
        }};
    //return view('thanks');
