@extends('layout.app')

@section('content')
    <h1>{{ $article->getTitle() }}</h1>
    <hr/>
    <article class="article-body">
        <p>{{ $article->getPublishedAt()->diffForHumans() }} by: {{ $article->user->getName() }}</p>
        {!! $article->getBody() !!}
    </article>

    @unless($article->tags->isEmpty())
        <ul class="tags">
            @foreach($article->tags as $tag)
                <li><a href="{{ url('tag', $tag->getSlug()) }}" class="tag">{{ $tag->getName() }}</a></li>
            @endforeach
        </ul>
    @endunless

    @include('partials.disqus')
@endsection