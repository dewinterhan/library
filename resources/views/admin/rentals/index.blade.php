@extends('layouts.admin')
@section('content')
    <h1>All Rentals</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Book</th>
            <th scope="col">Date Out</th>
            <th scope="col">Date In</th>

        </tr>
        </thead>
        <tbody>
            @if($rentals)
                @foreach($rentals as $rental)

                    <tr>
                        <td>{{$rental->id}}</td>
                        <td>{{$rental->user->name}}</td>
                        <td>{{--{{$rental->stock->book->title}}--}}</td>
                        <td>{{$rental->date_out}}</td>
                        <td>{{$rental->date_in}}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$rentals->links()}}
        </div>
    </div>
@stop
