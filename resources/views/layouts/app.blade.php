<?php

function sanitize_output($buffer)
{

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start("sanitize_output");

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="@yield('desc')">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title') {{Config::get("solaris.site.name")}}</title>
    <!-- Stylesheets & Fonts -->
    <link href="/assetWeb/polo/css/plugins.css" rel="stylesheet">
    <link href="/assetWeb/polo/css/style.css" rel="stylesheet">

    <!-- Template color -->
    <link href="/assetWeb/polo/css/color-variations/purple.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/custom.css?v={{rand(0,999)}}" rel="stylesheet">
    <script src="/assetWeb/polo/js/jquery.js"></script>
    @isset($amp)
        <link rel="amphtml" href="{{$amp}}"/> @endisset
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{Config::get("solaris.site.google")}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{Config::get("solaris.site.google")}}');
    </script>
</head>

<body>


<!-- Body Inner -->
<div class="body-inner">



    <header id="header">
        <div class="header-inner">
            <div class="container">
                <div id="logo">
                    <a href="/">
                        <span class="logo-default"><img width="110" src="/images/logo.png" alt=""></span>
                        <span class="logo-dark"><img width="110" src="/images/logo.png" alt=""></span>
                    </a>
                </div>
                <div class="header-extras">
                    <ul>
                        <li>
                            <a href="#"><i class="icon-shopping-cart"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-user"></i></a>
                        </li>
                    </ul>
                </div>

                <div id="mainMenu-trigger"><a class="lines-button x"><span class="lines"></span></a></div>
                <!--end: Navigation Resposnive Trigger-->
                <!--Navigation-->
                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>
                                @foreach($vars->menu as $key=>$val)
                                    <li @if (request("page") and request("page")==$val->id) class="current" @endif><a
                                            href="@if($val->link){{$val->link}}@else{{"/".str_slug($val->title,"-")."/".$val->id.".html"}}@endif">{{$val->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--end: Navigation-->
            </div>
        </div>
    </header>

@yield("content")

<!-- Footer -->
    <footer id="footer">

        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; {{date("Y")}} {{Config::get("solaris.site.name")}}<a
                        href="#"
                        target="_blank"
                        rel="noopener"> </a></div>
            </div>
        </div>
    </footer>
    <!-- end: Footer -->

</div>
<!-- end: Body Inner -->

<div id="cookieNotify" class="modal-strip cookie-notify background-dark" data-delay="1000" data-expire="1"
     data-cookie-name="cookiebar2020_1" data-cookie-enabled="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-sm-center sm-center sm-m-b-10 m-t-5">
                {{Config::get("solaris.site.cookiedesc")}}
            </div>
            <div class="col-lg-4 text-right sm-text-center sm-center">

                <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm">
                    {{Config::get("solaris.site.cookiebutton")}}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->

<script src="/assetWeb/polo/js/plugins.js"></script>

<!--Template functions-->
<script src="/assetWeb/polo/js/functions.js"></script>

<!--Template functions-->
<script src="/js/solaris.js"></script>

</body>

</html><?php ob_end_flush();?>
