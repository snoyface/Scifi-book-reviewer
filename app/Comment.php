<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function users()
  {
  return $this->belongsToMany('\App\User')->withTimestamps();;
  }

  public function books()
  {
  return $this->belongsToMany('\App\Book')->withTimestamps();;
  }
}
