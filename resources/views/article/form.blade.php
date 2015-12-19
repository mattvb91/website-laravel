@extends('layout.app')

@section('content')
    <h1>{{ $description }}</h1>
    <hr/>


    @if(isset($article))
        <?php $published = $article->getPublished(); ?>
        {!! Form::model($article, ['method'=>'PATCH', 'action' => ['ArticleController@update', $article->getKey()]]) !!}
    @else
        <?php $published = App\Models\Article::UNPUBLISHED; ?>
        {!! Form::open(['url' => 'article']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('published_at', 'Published On:') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Published', 'Published:') !!}

        {!! Form::select('published', \App\Models\Article::getStatuses(), $published, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($description, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@endsection