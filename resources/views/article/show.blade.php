@extends('layout.app')

@section('content')
    <h1>{{ $entity->getTitle() }}</h1>
    <hr/>
@endsection