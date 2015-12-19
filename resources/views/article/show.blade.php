@extends('layout.app')

@section('content')
    <h1>{{ $article->getTitle() }}</h1>
    <hr/>
    <article>
        <p>{!! $article->getBody() !!}</p>
    </article>
@endsection