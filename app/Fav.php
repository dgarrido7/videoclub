<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
  protected $fillable = [
    'user_id',
    'movie_id'
  ];


  
      public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function movies()
    {
        return $this->belongsTo('App\movies');
    }

}
