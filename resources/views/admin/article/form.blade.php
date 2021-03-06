@extends('layout.app')

@section('header')
    <link href="/css/summernote.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    <h1>{{ $description }}</h1>
    <hr/>


    @if(isset($article))
        <?php $published = $article->getPublished(); ?>
        {!! Form::model($article, ['method'=>'PATCH', 'action' => ['Admin\ArticleController@update', $article->getKey()]]) !!}
    @else
        <?php $published = App\Models\Article::UNPUBLISHED; ?>
        {!! Form::open(['url' => 'admin/article']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        <textarea id="summernote" name="body"></textarea>
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
        {!! Form::label('tag_list', 'Tags:') !!}
        {!! Form::select('tag_list[]', $tags, null, ['id'=>'tag_list','class' => 'form-control', 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($description, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@endsection

@section('footer')
    <script src="/js/summernote.js"></script>

    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true,
            tokenSeparators: [','],
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#summernote').summernote({
                        height: 300,
                        focus: true,
                        callbacks: {
                            onImageUpload: function (files) {
                                uploadImage(files[0]);
                            }
                        }
                    }
            );

            function uploadImage(file) {
                data = new FormData();
                data.append("file", file);
                $.ajax({
                    data: data,
                    type: 'POST',
                    url: '/api/image',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (url) {
                        $('#summernote').summernote('insertImage', url);
                    }
                });
            }

            @if(isset($article))
                $('#summernote').summernote('code', {!! json_encode($article->getBody()) !!});
            @endif
        });

    </script>
@endsection