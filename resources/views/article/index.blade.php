@extends('layout.app')

@section('content')
    <h1>Articles</h1>

    <hr/>

    @foreach($articles as $article)
        <?php /* @var $article \App\Models\Article */ ?>
        <article>
            <h2>
                <a href="{{ url('/article', $article->getSlug()) }}">
                    {{ $article->getTitle() }}
                </a>
            </h2>

            <div class="body">
                <p>{{ $article->getPublishedAt()->diffForHumans() }} by: {{ $article->user->getName() }}</p>

                <p>
                    {!! \App\Helpers\Html::trim($article->getBody(), 400) !!}
                </p>
            </div>
            @unless($article->tags->isEmpty())
                <ul class="tags">
                    @foreach($article->tags as $tag)
                        <li><a href="{{ url('tag', $tag->getName()) }}" class="tag">{{ $tag->getName() }}</a></li>
                    @endforeach
                </ul>
            @endunless
            <a href="{{ url('/article', $article->getSlug()) }}">
                <h4>Continue reading</h4>
            </a>
            <hr/>
        </article>
    @endforeach

    @if($articles->count())
        {!! $articles->appends(Request::only('term'))->render() !!}
    @endif

@endsection