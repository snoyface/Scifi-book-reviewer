<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  

  public function books()
  {
  return $this->belongsToMany('\App\Book')->withTimestamps();;
  }
  public function user()
  {
  return $this->belongsTo('\App\User')->withTimestamps();;
  }
  
}
