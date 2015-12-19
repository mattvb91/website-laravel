@extends('layout.app')

@section('content')
    <h1>Articles</h1>

    <hr/>

    @foreach($articles as $article)
        <?php /* @var $article \App\Models\Article */ ?>
        <article>
            <h2>
                <a href="{{ url('/article', $article->getKey()) }}">
                    {{ $article->getTitle() }}
                </a>
            </h2>

            <div class="body">
                <p>{{ $article->getPublishedAt()->diffForHumans() }} by: {{ $article->user->getName() }}</p>

                <p>
                    {{ $article->getBody() }}
                </p>
            </div>
        </article>
    @endforeach

    {!! $articles->render() !!}

@endsection