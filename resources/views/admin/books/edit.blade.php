@extends('layouts.admin')
@section('content')
    <h1>Edit Author</h1>
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($author,['method' => 'PATCH', 'action' => ['AdminAuthorsController@update', $author->id]]) !!}

            <div class="form-group">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminAuthorsController@destroy', $author->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Author', ['class' => 'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_error')
        </div>
    </div>
@stop
