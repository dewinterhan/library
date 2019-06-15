<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'date_in', 'date_out', 'created_at', 'updated_at'
    ];
    public function user(){
        return $this->belongsTo('App\Photo');
    }
    public function books(){
        return $this->belongsTo('App\Book');
    }
}
