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
<link rel="stylesheet" href="{{ asset('assets/css/skeleton.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/base.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/supersized.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/supersized.shutter.css') }}"/>


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Favicons-->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

<!-- Jquery -->
<script src="{{ asset('assets/js/jquery1.8.2.min.js') }}"></script>

</head>
<body>

<a href="{{ route('home') }}" id="close"></a>
<a href="#" data-reveal-id="gallery-menu" class="nav-gal"></a>
<!--Arrow Navigation-->
<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>
<div id="slidecaption" ></div>

<!--Start gallery menu  --> 
@yield('menu')
<!--End gallery menu  -->  

<!-- JS -->
<script src="{{ asset('assets/js/jquery.reveal.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/supersized.3.2.7.min.js') }}"></script>
<script src="{{ asset('assets/js/supersized.shutter.min.js') }}"></script>

@yield('scripts')


</body>
</html>