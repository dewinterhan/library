<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'first_name','last_name'
    ];
    /*public function bookDetails(){
        return $this->hasMany('App\Book');
    }*/
}
