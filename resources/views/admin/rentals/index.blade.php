@extends('layouts.admin')
@section('content')
    <h1>All Books</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">ISBN</th>
            <th scope="col">Copies</th>
            <th scope="col">Release Year</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th>
            <th scope="col">updated_at</th>
            <th scope="col">created_at</th>
        </tr>
        </thead>
        <tbody>
           @if ($books)
               @foreach($books as $book)
                   <tr>
                       <td>{{$book->id}}</td>
                       <td><a href="{{route('books.edit', $book->id)}}">{{$book->title}}</a></td>
                       <td><a href="{{route('authors.edit', $book->author->id)}}">{{$book->author->first_name}} {{$book->author->last_name}}</a></td>
                       <td>{{$book->isbn}}</td>
                       <td>{{$book->copies}}</td>
                       <td>{{$book->release_year}}</td>
                       <td>{{$book->description}}</td>
                       <td><img height="50" width="50" src="{{$book->photo ? asset($book->photo->file) : 'http://placehold.it/20x20'}}" alt=""></td>
                       <td>{{$book->created_at}}</td>
                       <td>{{$book->updated_at}}</td>
                   </tr>
               @endforeach
           @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 text-center">
            {{$books->links()}}
        </div>
    </div>
@stop
