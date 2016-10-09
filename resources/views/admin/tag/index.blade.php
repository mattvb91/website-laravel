@extends('layout.app')

@section('content')
    <h1>Tags</h1>

    <hr/>

    <a href="{{ url('/admin/tag/create') }}" class="btn btn-primary pull-right">Create Tag</a>

    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Slug</th>
        <th>Articles</th>
        </thead>
        @foreach($tags as $tag)
            <tr>
                <td>
                    <?php /* @var $article \App\Models\Tag */ ?>
                    <a href="{{ action('Admin\TagController@edit', $tag) }}">
                        {{ $tag->getName() }}
                    </a>
                </td>
                <td>
                    {{ $tag->slug }}
                </td>
                <td>
                    {{ $tag->articles()->count() }}
                </td>
            </tr>
        @endforeach
    </table>

    @if($tags->count())
        {!! $tags->render() !!}
    @endif

@endsection