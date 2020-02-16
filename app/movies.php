<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $fillable = [
    	'title',
    	'year',
    	'director',
    	'rented',
    	'img',
    	'synopsis'
	];

	public function reviews(){
      return $this->hasMany(Review::class);
    }
    public function category()
    {
    return $this->belongsTo(Category::class);
    }
    public function favs()
    {
        return $this->hasMany('App\favs');
    }



}
