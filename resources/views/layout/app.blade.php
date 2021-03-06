<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mavon.ie | {{ $pageTitle ??  'PHP Contractor - Ireland' }}</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet"/>
    @yield('header')
    @if(env('APP_ENV') == 'production')
        @include('partials.analytics')
    @endif
</head>
<body>
    <div class="container">

        @include('partials.nav')

        {!! Breadcrumbs::renderIfExists() !!}

        @include('flash::message')

        @include('errors.list')

        @if(empty($admin_view))
            <div class="col-md-9">
        @else
            <div class="col-md-12">
        @endif

        @yield('content')
        </div>

        @if(empty($admin_view))
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
        @endif

        <footer>

        </footer>
    </div>
    <script src="{{ elixir('js/all.js') }}"></script>
    @yield('footer')
</body>
</html>