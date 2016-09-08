<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <!-- meta character set -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>AccessWorld @yield("title")</title>

    <!-- Meta Description -->
    <meta name="description" content="@yield('meta:description', 'We understand the IT needs of a modern business like yours. Let the experts manage your IT with great infrastructure and support so that you can focus on your core business 24×7.')">
    <meta name="author" content="AccessWorld">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo csrf_token() ?>"/>

    <meta property="og:title" content="@yield('og:title', 'AccessWorld, Cloud and Beyond')" />
    <meta property="og:url" content="@yield('og:url', Request::url())" />
    <meta property="og:description" content="@yield('og:description', 'We understand the IT needs of a modern business like yours. Let the experts manage your IT with great infrastructure and support so that you can focus on your core business 24×7.')" />
    <meta property="og:image" content="@yield('og:image', asset('assets/img/img16.jpg'))" />
    <meta property="og:image:width" content="720" />

    <!-- BEGIN FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset("favicon.png") }}" />
    <!-- END FAVICON -->

    <link rel="publisher" href="{{ site_info('google_plus') }}"/>

    <link href="//fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900" rel="stylesheet"/>

    {{ Html::style("assets/css/dep.css")}}
    {{ Html::style("assets/css/awt.css") }}
    <style type="text/css">.profile-info small{padding: 8px 0;}</style>
    @yield("header")
</head>

<body class="header-fixed">
    @include("layouts.navbar")
    @include("commons.navcart")
    <div id="base" class="no-padding">
        @include('layouts.offcanvas')
        <!-- BEGIN CONTENT-->
        <div id="content">
            @yield("body")
        </div><!--end #content-->
        <!-- END CONTENT -->
        @include("layouts.footer")
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/dep.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/awt.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/parallax.js-1.4.2/parallax.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        //Session messages
        var successMsg = "{{Session::get('success')}}";
        var infoMsg = "{{Session::get('info')}}";
        var warningMsg = "{{Session::get('warning')}}";
        var dangerMsg = "{{Session::get('danger')}}";
        var errorMsg = "{!! implode($errors->all(), '<br/>') !!}";

        //Active links
        $(document).ready(function () {
            var requestUrl = "{{Request::url()}}";
            var $activeLink = $("#menubar a[href='" + requestUrl + "']");

            $activeLink.addClass('active');

        });
    </script>
    @yield("footer")
</body>
</html>