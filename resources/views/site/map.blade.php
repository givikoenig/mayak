<div class="section-title-2">
  <a href="#about" class="scroll_a"> Back to top</a> <span class="border-top"></span>
  <div class="bg-2"></div>
  <div class="container">
    <h2 class="h1-100-ultra-condensed">Расположение</h2>
    <p>- Наше место у маяка на мысе Гвардейском - </p>
  </div>
</div>

<div id="map" class="map-block">

 <div id="googleMap" style="height: 450px;"></div>
  <div id="map-overlay">
      <address style="color:#fff;">
        <strong>ДОМ НА МОРЕ "У МАЯКА"</strong><br>
        238590<br>
        Россия,<br>
        Калининградская область,<br>
        Зеленоградский район,<br>
        пос.Заостровье<br>
        <abbr title="Phone">Tel:</abbr><a href="tel:+79062370031" class=""> +7 906 237 00 31</a> <br>
        <abbr title="Enail">Email: </abbr><span class="e">dkartsev58 / mail, ru</span>
      </address>
      &copy; {{ date('Y') > 2018 ? '2018 - ' . date('Y') : '2018' }} Сосны, тишина и море… 
      <hr>
      Powered by: <a target="_blank" href="http://givik.ru" title="GiViK">GiViK</a>
  </div>
</div>
<!-- end map--> 

<!-- Google Maps API --> 

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
</script>
