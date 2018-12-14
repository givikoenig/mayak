<section id="about">
  <div class="section-title-2">
   <div class="container">
    <h2 class="h1-100-ultra-condensed">Дом&nbsp;&nbsp;на&nbsp;&nbsp;море&nbsp;&nbsp;"У маяка"</h2>
    <p>-&nbsp;&nbsp;Сосны,&nbsp;&nbsp;тишина&nbsp;&nbsp;и&nbsp;&nbsp;море&nbsp;&nbsp;…&nbsp;&nbsp;- </p>
   </div>
  </div>
  <div class="container"> 
     <div class="row clearfix">
    <article class="article">
    <h3>{{ $about->title }}<span>{{ $about->subtitle }}</span></h3>
    <div class="text-image">
      <p>{!! $about->text  !!}</p>
      </div>
    </article>
  
    </div>


    <!-- Carousel items -->
    @if(!$about_services->isEmpty())
      <div class="mycont">
        <ul class="mycarousel thumbs" data-gallery="one">
            @foreach ($about_services as $service)
              <li class="item">
                <figure><a href="{{ asset('assets') }}/images/{{ $service->img }}"><div class="icon-hover" ></div><img src="{{ asset('assets') }}/images/{{ $service->img }}" class="scale-with-grid" alt=""></a></figure>
                <div class="spacer-2">
                  <h3>{{ $service->title }} <span>{{ $service->subtitle }}</span></h3>
                  <p>{{ $service->text }}</p>
                </div>
              </li>
            @endforeach
        </ul>
      </div>
    @endif

    <hr>    
   
     <div class="section-title-3">
     <h3>Прогноз погоды</h3>
      <p>Погода "У Маяка" сейчас и прогноз на текущую неделю</p>
    </div>
	<div id="weather" class="clearfix"></div>
</div><!-- End Container --> 
</section>
<!-- =========================End About section============================= -->

<!-- Start Background -->
<section  id="stestimonials">
<div id="bg-container-2">
<a href="#about" class="scroll_a"> Наверх</a> <span class="border-top"></span>
  <div class="bg2"></div>
  <div class="container" id="otzyvy">
    <div class="section-title">
      <h2 class="alltst"><a href="{{route('testimonials')}}" title="Смотреть все отзывы">Отзывы</a></h2>
    </div>
    @if(!$testimonials->isEmpty())
    <article class="twelve columns offset-by-two" >
      {{-- <a href="{{route('testimonials')}}" title="Смотреть все отзывы"> --}}
      <div id="testimonials" >
        <ul >
          @foreach($testimonials as $item)
          <li class="alltst"><a href="{{route('testimonials')}}" title="Смотреть все отзывы"><blockquote>{!! str_limit( $item->text, 120 ) !!}</blockquote><cite>{{ $item->sig }}</cite></a> </li>
          @endforeach
        </ul>
      </div>
    </article>
    @endif
    <br class="clear">
  </div>
</div><!-- End Background -->
</section>

<section class="tst">
  <div class="container">
    <div class="four columns">&nbsp;</div>
    <div class="twelve columns text-center">
      <h4>Оставить отзыв</h4>
      <div id="message-contact"></div>
      <form method="post" action="{{route('home')}}/addotzyv" id="contact-form">
        {{ csrf_field() }}
        <fieldset>
          <span><label>Ваше имя (обязательно)</label><input class="reset" name="name_contact" id="name_contact" type="text"/></span>
          <br class="clear">
        </fieldset>
        <fieldset>
          <span><label> Email  (не публикуется) (обязательно)</label><input class="reset" name="email_contact" id="email_contact" type="email"/></span>
          <br class="clear">
        </fieldset>
        <fieldset>
          <span><label>Web-сайт</label><input class="reset" name="site_contact" id="site_contact" type="url"/></span>
          <br class="clear">
        </fieldset>
        <label> Ваш отзыв </label>
        <textarea class="reset" name="message_contact" id="message_contact"></textarea><br>
        <fieldset>
          {!! NoCaptcha::display() !!}
          <br class="clear">
        </fieldset>
        <button type="submit" class="button_4"  id="submit_contact">Отправить сообщение </button>
      </form>
    </div>
    <div class="cart_result" id="confirm_rez"><p></p></div>
  </div>
</section>




<!-- =========================Start Rooms section============================= -->
<section id="rooms" >
  <div class="section-title-2">
    <div class="container">
      <h2 class="h1-100-ultra-condensed">Тарифы</h2>
      <p>- Расценки на проживание в доме "У Маяка" - </p>
    </div>
  </div>

  <div class="container">

      @if(!$tariffs->isEmpty())
        @foreach($tariffs as $tariff)
          <article class="clearfix article">
            <div class="sixteen columns clearfix tariff text-image">
              <h3>{{ $tariff->title }}<span>{{ $tariff->subtitle }}</span></h3>
                {!! $tariff->text !!}
            </div>
          </article>
        @endforeach
      @endif

      <!-- Start Room 1 -->
      @if(!$rooms->isEmpty())
        @foreach($rooms as $room)
          <article class="clearfix">
            <div class="seven columns alpha">
              @if($room->images)
              <div class="flexslider thumbs" data-gallery="two">
                <ul class="slides">
                  @foreach ($room->images as $image)
                  <li><figure><a href="{{ asset('assets') }}/images/{{ $image }}"><div class="icon-hover" ></div><img src="{{ asset('assets') }}/images/{{ $image }}" alt=""></a></figure><p class="flex-caption"></p></li>
                  @endforeach
                </ul>
                <span class=""><small></small><em></em></span></div>
                <!-- end flexi--> 
            </div>
            @endif
            
            <div class="nine columns omega">
              <div class="spacer-3">
                <h3>{{ $room->title }}<span>{{ $room->subtitle }}</span></h3>
                <p>{!! $room->text !!}</p>

                <ul class="room_facilities">
                  @foreach($room->icons as $icon)
                  <li class="{{ $icon }}"><a class="tooltip_1" href="#" title="{{ $services[$icon] }}">{{ $services[$icon] }}</a></li>
                  @endforeach
                </ul>

              </div>
            </div>
          </article><!-- End Room 1 --> 
        @endforeach
      @endif
    
    
    
      
    
  </div>  
</section>
<!-- =========================Start Rooms section============================= -->


<!-- Start Background -->
<section id="gallery">
<div id="bg-container-3">  <a href="#about" class="scroll_a"> В начало</a> <span class="border-top"></span>
<div class="bg3"></div>
  <div class="container">
  <div class="section-title ten columns gallery">
    	<h2 class="alltst"><a href="{{ route('gallery') }}">Смотреть фото </a></h2>
   </div>
   <div class="six columns">
        <span class="gallery-bt"><a href="{{ route('gallery') }}"><img src="{{ asset('assets') }}/images/fullscreen-button.png" width="213" height="152" alt=""></a></span>
   </div>
 </div>
</div>
</section><!-- End Background -->

<!-- =========================Start Contact section============================= -->
<section id="contact">
  <div class="section-title-2">
  <div class="container">
    <h2 class="h1-100-ultra-condensed">Обратная связь</h2>
    <p>- Пишите, звоните, оставляйте Ваши отзывы  - </p>
  </div>
  </div>
  <div class="container">
    <div  class="two-thirds column msg"><br>
      {{-- <h4>Написать сообщение</h4> --}}
        <ul class="tabs">
        <!-- Give href an ID value of corresponding "tabs-content" <li>'s -->
            <li><a class="active" href="#firstab-2">Заказать обратный звонок</a></li>
            <li><a href="#firstab-1">Написать сообщение</a></li>
        </ul>

        <ul class="tabs-content contact">
          <li class="active" id="firstab-2">
            <div id="callback"></div>
            <form method="post" action="{{route('home')}}/callback" id="callback-form">
              {{ csrf_field() }}
              <fieldset>
              <span><label>Ваше имя (обязательно)</label><input class="reset" name="name_callback" id="name_callback" type="text"/></span>
              <br class="clear">
              </fieldset>
              <fieldset>
                <span><label> Телефон (не публикуется) (обязательно)</label><input class="reset" name="phone_callback" id="phone_callback" type="tel"/></span>
                  <br class="clear">
              </fieldset>
              <fieldset>
                  {!! NoCaptcha::display() !!}
                  <br class="clear">
              </fieldset>
              <button type="submit" class="button_4"  id="submit_callback">Отправить заявку </button>
            </form>
          </li>

          <li id="firstab-1">

            <div id="message-cont"></div>
            <form method="post" action="{{route('home')}}/sendmsg" id="cont-form">
              {{ csrf_field() }}
              <fieldset>
              <span><label>Ваше имя (обязательно)</label><input class="reset" name="name_cont" id="name_cont" type="text"/></span>
              <br class="clear">
              </fieldset>
              <fieldset>
              	<span><label> Email  (не публикуется) (обязательно)</label><input class="reset" name="email_cont" id="email_cont" type="email"/></span>
                  <br class="clear">
              </fieldset>
              <fieldset>
                  <span><label>Web-сайт</label><input class="reset" name="site_cont" id="site_cont" type="url"/></span>
              <br class="clear">
              </fieldset>
                <label> Ваше сообщение </label>
                <textarea class="reset" name="message_cont" id="message_cont"></textarea><br>
                <fieldset>
                  {!! NoCaptcha::display() !!}
                  <br class="clear">
                </fieldset>
              <button type="submit" class="button_4"  id="submit_cont">Отправить сообщение </button>
            </form>
          </li>

          

        </ul>
    </div>
    <div  class="one-third column contacts-r">
      <ul class="add-bottom_2">
        <li><h4>Дом на море "У маяка"</h4></li>
        <li>238950</li>
        <li>Россия,</li>
        <li>Калининградская область,</li>
        <li>Зеленоградский район,</li>
        <li>пос.Заостровье</li>
        <li>+7 906 237 00 31</li>
        <li><span class="e">dkartsev58 / mail, ru</span> - <a href="{{ route('home') }}">u-mayaka.ru</a></li>
      </ul>
      <h4 id="directions">Где это ?<span>(Введите Ваше местоположение, напр.  Самара. )</span></h4>
        <form action="http://maps.google.com/maps" method="get" target="_blank">
        <input type="text" name="saddr"  placeholder="Ваше местоположение…"/>
        <input type="hidden" name="daddr" value="ZAOSTROV'YE, KALININGRAD OBLAST, 238590, RUSSIA" />
        <input type="submit" value="Посмотреть направление" class="button_4" />
    </form>     
     {{--  <ul class="social-bookmarks clearfix">
        <li class="facebook"><a href="#">facebook</a></li>
        <li class="googleplus"><a href="#">googleplus</a></li>
        <li class="twitter"><a href="#">twitter</a></li>
      </ul> --}}
    </div>
    <div class="cart_result2" id="confirm_rez2"><p></p></div>
  </div>
</section>
<!-- =========================end Contacts section============================= -->
