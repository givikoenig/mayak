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

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11097556-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>

</head>

<body>


@yield('header')
<!-- =========================Start Homepage section============================= -->
<!--<div id="app">-->
{!! NoCaptcha::renderJs() !!}
@yield('content')
@yield('map') 
<!--</div>-->
<!-- Homepage slideshow --> 
<script src="{{ asset('assets/js/jquery.reveal.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script> 
<script src="{{ asset('assets/js/supersized.3.2.7.min.js') }}"></script> 
<script src="{{ asset('assets/js/supersized.shutter.min.js') }}"></script> 

@yield('slides')

<script src="{{ asset('assets/js/jquery.jcarousel.min.js') }}"></script> 
<script src="{{ asset('assets/js/quotes.min.js') }}"></script> 
<script src="{{ asset('assets/js/flexi_slider.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.poshytip.min.js') }}"></script> 
<script src="{{ asset('assets/js/tabs.js') }}"></script> 
<script src="{{ asset('assets/js/touchTouch.jquery.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.scrollTo.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
<script src="{{ asset('assets/js/jquery.emaillink-1.4.min.js') }}"></script>

<!-- Date picker--> 
<script src="{{ asset('assets/js/1.8.jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.core.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
<script src="{{ asset('assets/js/jquery.goup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/fancybox/jquery.fancybox-1.2.1.pack.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/jquery.fancybox.css') }}" media="screen" />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIH50GgDpslFv1iAe-lyhZOESBRilYAOQ&callback=initMap"></script>
<script src="{{ asset('assets/js/map.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>

<!-- Weather widget-->
<script src="{{ asset('assets/js/jquery.simpleWeather.js') }}"></script> 
<script>
$(document).ready(function() {
  $.simpleWeather({
    location: "Zaostrov'ye, Kaliningrad Oblast, Russia",
    woeid: '2125979',
    unit: 'c',
    success: function(weather) {
      html = '<h4><i class="weathericon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h4>';
      html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
      html += '<li class="currently">'+weather.currently+'</li>';
      html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
	  
	   for(var i=0;i<weather.forecast.length;i++) {
        html += '<span class="details_forecast">'+weather.forecast[i].day+': '+weather.forecast[i].high+'</span>';
      }
  
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
});
</script>

</body>
</html>
