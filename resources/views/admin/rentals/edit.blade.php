@extends('layouts.admin')
@section('content')
    <h1>Edit Book</h1>
    <div class="row">

            {!! Form::model($book,['method' => 'PATCH', 'action' => ['AdminBooksController@update', $book->id]]) !!}
            <div class="col-md-6">
                <div style="margin-bottom: 20px">
                    <img class="img-fluid" src="{{$book->photo ? asset('images/' .$book->photo->filename) : 'http://place-hold.it/500x500'}}" alt="">
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('title', 'Book Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('author_id', 'Author:') !!}
                    {!! Form::select('author_id', [''=>'Choose options'] + $author,null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('isbn', 'ISBN:') !!}
                    {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('copies', 'Copies:') !!}
                    {!! Form::number('copies', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('release_year', 'Release Year:') !!}
                    {!! Form::number('release_year', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminBooksController@destroy', $book->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Book', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_error')
        </div>
    </div>
@stop
