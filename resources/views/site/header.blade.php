<section id="homepage">
    <header>
        <div class="container">
            <div class="four columns">
                <a href="#homepage" ><img src="{{ asset('assets') }}/images/logo-2.png" width="35" height="35" alt="Logo" class="scale-with-grid" id="logo-in"> </a><!-- Your logo -->
            </div> 
            <div class="btn-responsive-menu"> <span class="icon-bar"></span> <span class="icon-bar"></span><span class="icon-bar"></span>
            </div> <!-- Responsive nav button -->
            <nav class="twelve columns omega" id="top-nav"> 
                <ul>
                    <li><a href="#about">Главная</a></li>
                    <li><a href="#otzyvy">Отзывы</a></li>
                    <li><a href="#rooms">Тарифы</a></li>
                    <li><a href="#gallery">Фотографии</a></li>
                    <li><a href="#contact">Контакты</a></li>
                    <li><a href="#map">Расположение</a></li>
                </ul><!-- End Nav Links -->
            </nav><!-- End Navigation -->
        </div>
    </header>
    <div id="intro-txt">
      <h1  class="h1-100-ultra-condensed">Дом у моря - Аренда</h1>
      <h2>7000 руб/сутки на 8 человек</h2>
      <div class="links-home"> <a href="#about" class="button_enter">На сайт</a><a href="#contact" class=" button_check">Обратный звонок</a></div>
    </div><!-- End intro text --> 
    <a id="prevslide" class="load-item"></a> <a id="nextslide" class="load-item"></a>
    <div id="footer-homepage">&copy;&nbsp;{{ date('Y') > 2018 ? '2018 - ' . date('Y') : '2018' }}&nbsp;&nbsp;&nbsp;{{ config('app.name') , 'u-mayaka' }}<strong><a href="tel:+79062370031" class=""> <img src="{{ asset('assets') }}/images/callback-1.png" alt="" width="13">&nbsp;+7 906 237 00 31</a></strong></div>
</section>
