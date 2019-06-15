<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images';
    protected $fillable = [
        'filename'
    ];
/*    public function getFileAttribute($photo){
        return $this->uploads. $photo;
    }*/
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
