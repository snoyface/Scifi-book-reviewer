<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
/*  public function creator(Request $request) {
    //take the form submissions and create vars to use
    $title = $request -> input('title');
    $auth = $request -> input('author');
    $sum = $request -> input('summary');

    DB::table('books')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'title' => '$title',
      'author' => '$auth',
      'summary' => '$sum',
*/  
  public function users()
  {
  return $this->belongsToMany('\App\User')->withTimestamps();;
  }

  public function ratings()
  {
  return $this->belongsToMany('\App\Rating')->withTimestamps();;
  }

  public function comments()
  {
  return $this->belongsToMany('\App\Comment')->withTimestamps();;
  }
}
