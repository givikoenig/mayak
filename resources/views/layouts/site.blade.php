<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]-->

<head>
<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>{{ $title or 'ДОМ НА МОРЕ "У МАЯКА"' }}</title>
<meta name="description" content="{{ $meta_desc  or  'Гостевой дом "У маяка" на Балтийском побережье: аренда, 7000 руб/сутки на 8 человек. Сосны, море, тишина' }}">
<meta name="keywords" content="{{ $keywords or 'Дом у моря, гостевой дом на побережье, аренда дома у моря, отдых на балтийском побережье' }}">
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/base.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/skeleton.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/backgound-images.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/supersized.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/supersized.shutter.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/socialize-bookmarks.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/touchTouch.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/weather.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/weather-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Lets you use only unprefixed CSS -->
<script src="{{ asset('assets/js/prefixfree.min.js') }}"></script>
<!-- Favicons-->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<!-- Jquery -->
<script src="{{ asset('assets/js/jquery1.8.2.min.js') }}"></script>
<!-- HTML5 and CSS3-in older browsers-->
<script src="{{ asset('assets/js/modernizr.custom.17475.js') }}"></script>

{{--Google Analytics--}}
{{--<script type="text/javascript">--}}
  {{--var _gaq = _gaq || [];--}}
  {{--_gaq.push(['_setAccount', 'UA-11097556-8']);--}}
  {{--_gaq.push(['_trackPageview']);--}}
  {{--(function() {--}}
    {{--var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;--}}
    {{--ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';--}}
    {{--var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);--}}
  {{--})();--}}
  {{--</script>--}}
</head>

<body>
@yield('header')
@yield('content')
@yield('map')
@yield('slides')
@yield('scripts')

</body>
</html>
