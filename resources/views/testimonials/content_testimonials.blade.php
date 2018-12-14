<div class="otz section-title-2">
  	<div class="container">
	    <h2 class="h1-100-ultra-condensed">Отзывы</h2>
	    <p>- О проживании в доме на море "У Маяка" - </p>
    </div>
</div>
<section id="tstmnls">
<div class="container">

      @if(!$testimonials->isEmpty())
        @foreach($testimonials as $testimonial)
          <article class="clearfix article">
            <div class="testimonial">
              	<p class="sdate">{{ Date::parse($testimonial->created_at)->format('d F Y в G:i') }}</p>
                {!! $testimonial->text !!}
                <p class="sig">- {{ $testimonial->sig }} -</p>
            </div>
          </article>
        @endforeach
      @endif
      <br>
      <div class="pagination">
        {{ $testimonials->links() }}
      </div>
      <br>
      <a href="{{ route('home') }}" class="button_enter">На сайт</a>
      <a href="{{ route('home') }}/#otzyvy" class="button_enter">Оставить отзыв</a>
      <br><br><br>
</div>

</section>
