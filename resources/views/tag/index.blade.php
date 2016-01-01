@extends('layout.app')

@section('content')
    <ul class="tags">
        @foreach($tags as $tag)
            <li>
                <a href="{{ url('tag', $tag->getName()) }}" class="tag">{{ $tag->getName() }} ({{ $tag->articles->count() }})</a>
            </li>
        @endforeach
    </ul>
@endsection