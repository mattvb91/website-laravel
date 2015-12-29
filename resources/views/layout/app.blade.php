<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mavon.ie</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet"/>
    @yield('header')
</head>
<body>
    <div class="container">

        @include('partials.nav')

        {!! Breadcrumbs::renderIfExists() !!}

        @include('flash::message')

        @include('errors.list')

        <div class="col-md-9">
            @yield('content')
        </div>
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>

        <footer class="footer">
            <hr/>
            <div class="container">
                <p class="text-muted"></p>
            </div>
        </footer>
    </div>
    <script src="{{ elixir('js/all.js') }}"></script>

    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).slideUp();
    </script>
    @yield('footer')
</body>
</html>