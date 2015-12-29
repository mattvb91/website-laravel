@extends('layout.app')

@section('content')
    <h1>{{ $description }}</h1>
    <hr/>


    @if(isset($tag))
        {!! Form::model($tag, ['method'=>'PATCH', 'action' => ['Admin\TagController@update', $tag->getKey()]]) !!}
    @else
        {!! Form::open(['url' => 'admin/tag']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($description, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@endsection