@extends('layout.app')

@section('content')
    <h1>Articles</h1>

    <hr/>

    <table class="table table-bordered">
        <thead>
        <th>Title</th>
        <th>Created</th>
        <th>Author</th>
        </thead>
        @foreach($articles as $article)
            <tr>
                <td>
                    <?php /* @var $article \App\Models\Article */ ?>
                    <a href="{{ action('Admin\ArticleController@edit', $article) }}">
                        {{ $article->getTitle() }}
                    </a>
                </td>
                <td>
                    {{ $article->getPublishedAt()->diffForHumans() }}
                </td>
                <td>
                    {{ $article->user->getName() }}
                </td>
            </tr>
        @endforeach
    </table>

    @if($articles->count())
        {!! $articles->render() !!}
    @endif

@endsection