<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8" />
        <title>
            @section('title')
            | {{Config::get('meter.title') }}
            @show

        </title>
        <meta name="keywords" content="{{Config::get('meter.keywords') }}" />
        <meta name="author" content="{{Config::get('meter.auther') }}" />
        <meta name="description" content="{{Config::get('meter.description') }}" />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS
        ================================================== -->
        {{ Basset::show('public.css') }}
        @section('css')
        @show

        <style>
            @section('styles')
            @show
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
    </head>

    <body>
        <!-- To make sticky footer need to wrap in a div -->
        <div id="wrap">
            <!-- Navbar -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                        <div class="nav-collapse collapse"> 
                            <ul class="nav">
                                <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}"><img src="{{{ asset('assets/img/gm-logo3.png') }}}"/> </a></li>
                            </ul>


                            <ul class="nav pull-right">
                                <li><a><i class="icon-download icon-top"></i> Download</a></li>

                                <li><a><i class="icon-twitter icon-top"></i> 22,202</a></li>
                                <li><a><i class="icon-facebook-sign icon-top"></i> 22,2023</a></li>


                                @if (Auth::check())
                                @if (Auth::user()->hasRole('admin'))
                                <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                                @endif
                                <li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
                                <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                                @else
                                <!--
                                <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                                <li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                                -->
                                @endif
                            </ul>

                            <div id="meter-header-name">
                                <h3>@yield('meter-name')</h3>
                            </div>
                        </div>
                        <!-- ./ nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- ./ navbar -->

            <!-- Container -->
            <div class="container">
                <!-- Notifications -->
                @include('notifications')
                <!-- ./ notifications -->

                <!-- Content -->
                @yield('content')
                <!-- ./ content -->
            </div>
            <!-- ./ container -->

            <!-- the following div is needed to make a sticky footer -->
            <div id="push"></div>
        </div>
        <!-- ./wrap -->


        <div id="footer">
            <div class="container">
                <p class="muted credit">
                    © GlobalMeter.com
                </p>
            </div>
        </div>

        <!-- Javascripts
        ================================================== -->
        {{ Basset::show('public.js') }}

        @yield('scripts')
    </body>
</html>
