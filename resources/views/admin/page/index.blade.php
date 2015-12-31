@extends('layout.app')

@section('content')
    <h1>Pages</h1>

    <hr/>

    <a href="{{ url('/admin/page/create') }}" class="btn btn-primary pull-right">Create Page</a>
    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Url</th>
        <th>Keywords</th>
        </thead>
        @foreach($pages as $page)
            <tr>
                <td>
                    <a href="{{ action('Admin\PageController@edit', $page) }}">
                        {{ $page->getName() }}
                    </a>
                </td>
                <td>
                    {{ $page->getUrl() }}
                </td>
                <td>
                    {{ $page->getKeywords() }}
                </td>
            </tr>
        @endforeach
    </table>

    @if($pages->count())
        {!! $pages->render() !!}
    @endif

@endsection