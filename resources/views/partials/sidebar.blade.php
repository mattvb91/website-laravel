<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Latest Posts</h4>
    </div>
    <ul class="list-group">
        @foreach($latest as $article)
            <li class="list-group-item">
                <a href="{{ url('article', $article->getSlug()) }}">{{ $article->getTitle() }}</a> - {{ $article->getPublishedAt()->diffForHumans() }}
            </li>
        @endforeach
    </ul>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <a href="{{ url('tag') }}">Tags</a>
        </h4>
    </div>
    <div class="panel-body">
        <ul class="list-inline">
            @foreach($tags as $tag)
                <li>
                    <a href="{{ url('tag', $tag->getName()) }}">{{ $tag->getName() }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>