<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author_id', 'isbn', 'copies', 'release_year', 'description', 'photo_id'
    ];

    public function author(){
        return $this->belongsTo('App\Author');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
