<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/admin') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
{{--<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h1 class="text-center">Library</h1>
        <form action="search" role="search" class="mt-5 form-inline align-self-center justify-content-center">
            @csrf
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-primary " type="submit">Search</button>
        </form>
        @if(isset($sbooksearch))
            <h4 class="">Search result for <b>{{$booksearch}}</b>:</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th class="text-center">Copies</th>
                    @if($user = Auth::administrator())
                        <th class="text-center">Rent book</th>
                        <th class="text-center">Return book</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <th>{{$book->title}}</th>
                        <th>{{$book->author->first_name}}{{$book->author->last_name}}</th>
                        <th>{{$book->description}}</th>
                        <th class="text-center">{{$book->copies}}/{{$book->rents}}</th>
                        @if($user = Auth::administrator())
                            <th class="text-center">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['SearchController@bookRented', $book->id]]) !!}
                                {!! Form::submit('New Rent', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </th>
                            <th class="text-center">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['RentalsController@bookReturned', $book->id]]) !!}
                                {!! Form::submit('New Return', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </th>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>--}}
{{--</div>--}}
</body>
</html>
