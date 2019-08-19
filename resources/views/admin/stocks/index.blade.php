@extends('layouts.admin')
@section('content')
    <h1>All Stock</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Book Title</th>
            <th scope="col">availability</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @if($stocks)
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->book->title}}</td>
                    <td>{{$stock->available == true ?'Available' : 'Not Available' }}</td>
                    <td class="flex-row">
                        <div>
                            @if ($stock->available == 1)
                                <input type="hidden" name="available" value="0">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['StocksController@update', $stock->id]]) !!}
                                {!! Form::submit('Rent',['class'=>'btn btn-primary btn-md']) !!}
                                {!! Form::close() !!}
                            @else
                                <input type="hidden" name="available" value="1">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['StocksController@update', $stock->id]]) !!}
                                {!! Form::submit('Return',['class'=>'btn btn-secondary btn-md']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        <div>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['StocksController@destroy', $stock->id]]) !!}
                            <input type="hidden" name="available" value="0">
                            {!! Form::submit('delete',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$stocks->links()}}
        </div>
    </div>
@stop
