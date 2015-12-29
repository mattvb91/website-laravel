@extends('layout.app')

@section('content')
    @foreach($tags as $tag)
        <article>
            <a href="{{ url('tag', $tag->getName()) }}">{{ $tag->getName() }}</a>
        </article>
    @endforeach
@endsection