@extends('layouts.admin')
@section('content')
    <h1>All Authors</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
           @if ($authors)
               @foreach($authors as $author)
                   <tr>
                       <td>{{$author->id}}</td>
                       <td><a href="{{route('authors.edit', $author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></td>
                       <td>{{$author->created_at}}</td>
                       <td>{{$author->updated_at}}</td>
                   </tr>
               @endforeach
           @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 text-center">
            {{$authors->links()}}
        </div>
    </div>
@stop
