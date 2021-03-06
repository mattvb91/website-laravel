<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Mavon.ie</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/article') }}">Blog</a></li>
                <li><a href="">About</a></li>
            </ul>


            @if($latest)
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/article', [$latest->slug ]) }}">Latest: {{ $latest->getTitle() }}</a>
                    </li>
                </ul>
            @endif

            <div class="col-sm-3 col-md-3 pull-right">
                {!! Form::open(['method'=>'GET', 'url'=>'search', 'class'=>'navbar-form']) !!}
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ Request::get('term') }}" placeholder="Search" name="term" id="term">

                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (!Auth::guest())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Admin</li>
                            <li><a href="{{ url('/admin/article') }}">Articles</a></li>
                            <li><a href="{{ url('/admin/page') }}">Pages</a></li>
                            <li><a href="{{ url('/admin/tag') }}">Tags</a></li>
                            <li><a href="{{ url('/admin/mailgun') }}">Mailgun</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>