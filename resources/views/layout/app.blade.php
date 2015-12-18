<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mavon.ie</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="/css/sticky-footer.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('errors.list')
        @yield('content')

        <footer class="footer">
            <hr/>
            <div class="container">
                <p class="text-muted"></p>
            </div>
        </footer>
    </div>
</body>
</html>