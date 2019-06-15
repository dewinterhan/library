<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksearch = Input::get('booksearch');
        $books = Book::join('authors', 'books.author_id', '=', 'authors.id')
            ->select('books.*')
            ->where('title', 'LIKE', '%' . $booksearch . '%')
            ->orWhere('first_name', 'LIKE', '%' . $booksearch . '%')
            ->orWhere('last_name', 'LIKE', '%' . $booksearch . '%')
            ->get();


        if($books) {
            return view('welcome')->withDetails($books)->withQuery($booksearch);
        }
        else return view('welcome')->withMessage('Sorry but there are no books or authors connected with what you searched for.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function books(){
        $rentals = Rental::all();
        return view('books', compact('rentals'));
    }

    public function bookRented($id)
    {
        $book= Book::findOrFail($id);
        if ($book->rents < $book->copies) {
            $newRent = value($book->rents)+1;
            $book->rents = $newRent;
            $book->save;
        }
        else {
            return back()->with('alert','Sorry all the copies of this book are rented at the moment.');
        }
    }

    public function bookReturned($id){
        $book = Book::findOrFail($id);
        if ($book->rents != 0){
            $newReturn = value($book->rents)-1;
            $book->rents = $newReturn;
            $book->save();
            return back()->with('alert','Thanks for returning the book you rented.');
        }
        else{
            return back()->with('alert', 'Are you sure that you are returning the right book? We have al our copies of that book.');
        }
    }
}
