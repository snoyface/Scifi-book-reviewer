<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
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
