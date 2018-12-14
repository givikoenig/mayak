<div class="section-title-2">
  <a href="#about" class="scroll_a"> Back to top</a> <span class="border-top"></span>
  <div class="bg-2"></div>
  <div class="container">
    <h2 class="h1-100-ultra-condensed">Расположение</h2>
    <p>- Наше место у маяка на мысе Гвардейском - </p>
  </div>
</div>

<div id="map" class="map-block">
  {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1428.326455711958!2d20.2690488!3d54.9601923!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sru!2sru!4v1518466941771" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}

 <div id="googleMap" style="height: 450px;"></div>
  <div id="map-overlay">
      <address style="color:#fff;">
        <strong>ДОМ НА МОРЕ "У МАЯКА"</strong><br>
        238590<br>
        Россия,<br>
        Калининградская область,<br>
        Зеленоградский район,<br>
        пос.Заостровье<br>
        <abbr title="Phone">Tel:</abbr> +7 906 237 00 31 <br>
        <abbr title="Enail">Email:</abbr> dkartsev58&#64;mail.ru
      </address>
      &copy; {{ date('Y') > 2018 ? '2018 - ' . date('Y') : '2018' }} Сосны, тишина и море… 
      <hr>
      Powered by: <a target="_blank" href="http://givik.ru" title="GiViK">GiViK</a>
  </div>
</div>

<!-- end map--> 


<!-- Google Maps API --> 

{{-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>  --}}
{{-- <script async defer src="https://maps.googleapis.com/maps/api/оs?key=AIzaSyCm15T53Gl3D11nCeESQeHmDS08sERJ0MI&callback=initMap"
  type="text/javascript"></script>
<script src="{{ asset('assets/js/gmap3.min.js') }}"></script> 
<script >
$('#map').gmap3({
marker:{
    latLng: [50.573418, 20.160711],
	options:{
          icon: "assets/images/gmap_marker.png"
        }
  },
  map:{
    options:{
      zoom: 12
    }
  }
});
</script> --}}
