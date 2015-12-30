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

        <footer>

        </footer>
    </div>
    <script src="{{ elixir('js/all.js') }}"></script>
    @yield('footer')
</body>
</html>