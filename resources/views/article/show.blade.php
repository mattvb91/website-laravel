@extends('layout.app')

@section('content')
    <h1>{{ $article->getTitle() }}</h1>
    <hr/>
    <article class="article-body">
        {!! $article->getBody() !!}
    </article>

    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->getName() }}</li>
            @endforeach
        </ul>
    @endunless

    @include('partials.disqus')
@endsection