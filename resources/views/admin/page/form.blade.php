@extends('layout.app')

@section('header')
    <link href="/css/summernote.css" rel="stylesheet">
@endsection

@section('content')
    <h1>{{ $description }}</h1>
    <hr/>


    @if(isset($page))
        {!! Form::model($page, ['method'=>'PATCH', 'action' => ['Admin\PageController@update', $page->getKey()]]) !!}
    @else
        {!! Form::open(['url' => 'admin/page']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url', 'Url:') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('keywords', 'Keywords:') !!}
        {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        <textarea id="summernote" name="body"></textarea>
    </div>

    <div class="form-group">
        {!! Form::label('type', 'Type:') !!}
        {!! Form::select('type', \App\Models\Page::getTypes(), null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nav_enabled', 'Navbar:') !!}
        {!! Form::select('nav_enabled', \App\Models\Page::getNavbarStatuses(), null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($description, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@endsection

@section('footer')
    <script src="/js/summernote.js"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                        height: 300,
                        focus: true
                    }
            );

            @if(isset($page))
                $('#summernote').summernote('code', {!! json_encode($page->getBody()) !!});
            @endif
        });

    </script>
@endsection