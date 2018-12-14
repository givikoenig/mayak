<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>{{ $title or 'ДОМ НА МОРЕ "У МАЯКА"' }}</title>
<meta name="description" content="Гостевой дом на Балтийском побережье 'У маяка': аренда, 7000 руб/сутки на 8 человек. Сосны, море, тишина">


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/skeleton.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/base.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}"/>

<link rel="stylesheet" href="{{ asset('assets/css/socialize-bookmarks.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/touchTouch.css') }}" />


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Favicons-->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

<!-- Jquery -->
<script src="{{ asset('assets/js/jquery1.8.2.min.js') }}"></script>

</head>
<body>

<!--Start gallery menu  --> 
@yield('header')
<!--End gallery menu  -->  

<script src="{{ asset('assets/js/jquery.jcarousel.min.js') }}"></script> 
<script src="{{ asset('assets/js/quotes.min.js') }}"></script> 
<script src="{{ asset('assets/js/flexi_slider.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.poshytip.min.js') }}"></script> 
<script src="{{ asset('assets/js/touchTouch.jquery.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.scrollTo.js') }}"></script>

@yield('content')
<!-- Date picker--> 
<script src="{{ asset('assets/js/1.8.jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.core.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/js/jquery.goup.min.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>


</body>
</html>