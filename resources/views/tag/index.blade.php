@extends('layout.app')

@section('header')
    <meta name="robots" content="noindex">
@endsection

@section('content')
    <ul class="tags">
        @foreach($tags as $tag)
            <li>
                <a href="{{ url('tag', $tag->getSlug()) }}" class="tag">{{ $tag->getName() }} ({{ $tag->articles->count() }})</a>
            </li>
        @endforeach
    </ul>
@endsection