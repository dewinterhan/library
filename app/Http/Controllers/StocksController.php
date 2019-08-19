<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rental;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::paginate(10);
        return view('admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::pluck('title', 'id')->all();
        return view('admin.stocks.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amount = $request->only('quantity');
        $amount = (int)$amount['quantity'];
        while ($amount != 0) {
            $input = $request->only('book_id');
            Stock::create($input);
        }

        return redirect('/admin/stocks');
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
        //Dit is een test
        $stock = Stock::findOrFail($id);

        if ($stock['available'] == 1) {
            $stock['available'] = 0;
            $rental = [
                'user_id' => Auth::id(),
                'stock_id' => $id,
                'date_out' => date("y-m-d"),
                'date_in' => Null,
            ];
            Rental::create($rental);
            $stock->update();
        } else {
            $rental = Rental::where("stock_id", "$id")->first();
            $stock['available'] = 1;
            $rental['date_in'] = date("y-m-d");
            $rental->update();
            $stock->update();
        }
        return redirect('admin/stocks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect('admin/stocks');
    }
}
