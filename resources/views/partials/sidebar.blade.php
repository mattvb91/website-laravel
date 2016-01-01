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
            External
        </h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="https://github.com/{{ env('GITHUB_USERNAME') }}" target="_blank"><img class="footer-img"
                                                                                           src="/build/img/GitHub-Mark-64px.png"/> - Github</a>
        </li>
        <li class="list-group-item">
            <a href="{{ env('LINKEDIN_PROFILE') }}" target="_blank"><img class="footer-img"
                                                                         src="/build/img/In-2C-59px-R.png"/> - LinkedIn</a>
        </li>
        <li class="list-group-item">
            <a href="{{ env('YOUTUBE_CHANNEL') }}" target="_blank"><img class="footer-img"
                                                                        src="/build/img/YouTube-social-squircle_red_128px.png"/> - Youtube</a>
        </li>
    </ul>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <a href="{{ url('tag') }}">Tags</a>
        </h4>
    </div>
    <div class="panel-body">
        <ul class="tags">
            @foreach($tags as $tag)
                <li>
                    <a class="tag" href="{{ url('tag', $tag->getName()) }}">{{ $tag->getName() }} ({{ $tag->articles()->count() }})</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>