@extends('layout.app')

@section('content')
    <h1>Articles</h1>

    <hr/>

    @foreach($entities as $entity)
        <?php /* @var $entity \App\Models\Article */ ?>
        <article>
            <h2>
                {{ $entity->getTitle() }}
            </h2>

            <div class="body">
                {{ $entity->getBody() }}
            </div>
        </article>
    @endforeach

    {!! $entities->render() !!}

@endsection