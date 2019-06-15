@extends('layouts.admin')
@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminBooksController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author_id', 'Author') !!}
        {!! Form::select('author_id', [''=>'Choose an author'] + $authors,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('isbn', 'ISBN:') !!}
        {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('copies', 'Copies:') !!}
        {!! Form::number('copies', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('release_year', 'Release Year:') !!}
        {!! Form::number('release_year',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_error')
@stop
