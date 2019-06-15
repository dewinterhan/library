@extends('layouts.admin')
@section('content')
    <h1>Create Author</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminAuthorsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Author', ['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
