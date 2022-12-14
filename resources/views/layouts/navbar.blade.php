<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('public/assets/front/images/version/market-logo.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @isset($main_nav) active @endisset">
                        <a class="nav-link" href="{{ route('home') }}">Main page</a>
                    </li>
                    <li class="nav-item @isset($article_nav) active @endisset">
                        <a class="nav-link" href="{{ route('articles.index') }}">Articles catalog</a>
                    </li>
                </ul>

                <style>
                    .market-header .form-inline .form-control.is-invalid {
                        border: 2px solid red;
                    }
                </style>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
