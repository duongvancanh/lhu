<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="icon" href="/img/favicon.ico" type="image/x-icon" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/design.css') }}" rel="stylesheet">
    <link href="/css/style2.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/textntags.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css"
          type="text/css"/>

    <link rel="stylesheet" href="/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css"/>

    <script src="/js/jquery-2.1.1.min.js"></script>

    <script src="/js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/js/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script type="text/javascript">
        var baseURL = "{{ url('/') }}";
    </script>

    <script src="/js/func_ckfinder.js" type="text/javascript"></script>

    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src='/js/underscore-min.js' type='text/javascript'></script>

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background: #E9EAED">
<header>
    @include('pages.header.nav')
</header>

@yield('content')

<!-- Scripts -->
<footer>
    @include('pages.footer.footer')
</footer>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="/js/boostrap.min.js"></script>
<script src='/js/jquery-textntags.js' type='text/javascript'></script>
<script src="/js/default.js"></script>
<script src="/js/blockUI.js"></script>
<script src="/js/upload.js"></script>
<script src="/js/waypoint.js"></script>
<script src="/js/plupload.full.min.js"></script>
<script src="/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
</body>
</html>
