<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('images/favicon-16x16.png') }}" sizes="16x16" />
        <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
        @stack('styles')
        <script>
            if(navigator.userAgent.indexOf("Safari")!=-1){
                console.log("You are using Safari!");
                document.write('<link rel="stylesheet" type="text/css" href="{{ asset("css/safari.css") }}" />');
            }
        </script>
        <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('js/vendor/semantic.min.js') }}"></script>
        <script src="{{ asset('js/vendor/snap.svg-min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @stack('scripts')
    </head>
    <body>
    <noscript>Your browser does not support JavaScript!</noscript>
    <!--[if lt IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="main-container">
        <div class="main wrapper clearfix">
            <aside>
                <a href="index.html"><img src="{{ asset('images/bci-logo.png') }}" /></a>
                <p>{{ $page_desc or null }}
                </p>
            </aside>
            <nav id="bci-menu">
                <a href="{{ url('/') }}" class="menu-url">
                    <div class="menu-circle" id="home-menu">home</div>
                </a>
                <a href="{{ url('about-us') }}" class="menu-url">
                <div class="menu-circle {{ Request::segment(1) == 'about-us' || Request::segment(1) == '' ? '' : 'invisible' }}" id="about-menu">about us</div></a>
                <a href="{{ url('clients') }}" class="menu-url"><div class="menu-circle {{ Request::segment(1) == 'clients' || Request::segment(1) == '' ? '' : 'invisible' }}" id="clients-menu">clients</div></a>
                <a href="{{ url('portfolio') }}" class="menu-url"><div class="menu-circle {{ Request::segment(1) == 'portfolio'  || Request::segment(1) == '' ? '' : 'invisible'}} " id="portfolio-menu">portfolio</div></a>
                <a href="{{ url('contact-us') }}" class="menu-url"><div class="menu-circle {{ Request::segment(1) == 'contact-us'  || Request::segment(1) == '' ? '' : 'invisible'}}" id="contact-us-menu">contact us</div></a>
            </nav>
               @yield('content')
        </div> <!-- #main -->
    </div> <!-- #main-container -->
    </body>
</html>
